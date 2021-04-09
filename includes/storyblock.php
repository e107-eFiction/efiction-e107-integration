<?php
// ----------------------------------------------------------------------
// Copyright (c) 2007 by Tammy Keefer
// Valid HTML 4.01 Transitional
// Based on eFiction 1.1
// Copyright (C) 2003 by Rebecca Smallwood.
// http://efiction.sourceforge.net/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

if(!defined("_CHARSET")) exit( );
	if(!isset($count)) $count = 0;
	$tpl->assign("sid", $stories['sid']);
	unset($challengelinks, $challengeadmin, $serieslinks, $categorylinks, $adminlinks, $authlink);
	if($stories['coauthors'] == 1) {
		$coauthors = array();
		$coauth = dbquery("SELECT "._PENNAMEFIELD." as penname, co.uid FROM ".TABLEPREFIX."fanfiction_coauthors AS co LEFT JOIN "._AUTHORTABLE." ON co.uid = "._UIDFIELD." WHERE co.sid = '".$stories['sid']."'");
		while($c = dbassoc($coauth)) {
			$coauthors[$c['uid']] = $c['penname'];
		}
		$stories['coauthors'] = $coauthors;
		unset($coauthors);
	}
	else if(empty($stories['coauthors'])) $stories['coauthors'] = array( );	
	$tpl->assign("title"   , stripslashes(title_link($stories)) );
	$tpl->assign("author"   , author_link($stories));
	$tpl->assign("summary", stripslashes($stories['summary']) );
	$tpl->assign("rating"   , $ratingslist[$stories['rid']]['name']);
	$tpl->assign("score", ratingpics($stories['rating']) );
	$tpl->assign("count", $stories['count'] ? $stories['count'] : "0");
	$allclasslist = "";
	$adminlinks = "";
	$storyclasses = array( );
	if($stories['classes']) {
		foreach(explode(",", $stories['classes']) as $c) {
			if(isset($action) && $action == "printable") $storyclasses[$classlist["$c"]['type']][] = $classlist[$c]['name'];
			else $storyclasses[$classlist["$c"]['type']][] = "<a href='browse.php?type=class&amp;type_id=".$classlist["$c"]['type']."&amp;classid=$c'>".$classlist[$c]['name']."</a>";
		}
	}
	foreach($classtypelist as $num => $c) {
		if(isset($storyclasses[$num])) {
			$tpl->assign($c['name'], implode(", ", $storyclasses[$num]));
			$allclasslist .= "<span class='label'>".$c['title'].": </span> ".implode(", ", $storyclasses[$num])."<br />";
		}
		else {
			$tpl->assign($c['name'], _NONE);
			$allclasslist .= "<span class='label'>".$c['title'].": </span> "._NONE."<br />";
		}
	}		
	// We only want to pull this list once
	if(!isset($storycodeblocks)) {
		$storycodeblocks = array( );
		$codequery = dbquery("SELECT * FROM ".TABLEPREFIX."fanfiction_codeblocks WHERE code_type = 'storyblock'");
		while($code = dbassoc($codequery)) {
			$storycodeblocks[] = $code['code_text'];
		}
	}
	if(count($storycodeblocks)) foreach($storycodeblocks as $c) { eval($c); } 
	$tpl->assign("classifications", $allclasslist);
	$seriesquery = "SELECT series.* FROM ".TABLEPREFIX."fanfiction_inseries as list, ".TABLEPREFIX."fanfiction_series as series WHERE list.sid = '".$stories['sid']."' AND series.seriesid = list.seriesid";
	$seriesresult = dbquery($seriesquery) or die(_FATALERROR."<br>Query: $seriesquery<br>Error: (".mysql_errno( ).") ".mysql_error( ));
	$serieslinks = array( );
	while($s = dbassoc($seriesresult)) {
		if(isset($action) && $action == "printable") $serieslinks[] = stripslashes($s['title']);
		else $serieslinks[] = "<a href=\"".e_HTTP."viewseries.php?seriesid=".$s['seriesid']."\">".stripslashes($s['title'])."</a>";
	}
	$tpl->assign("serieslinks", (count($serieslinks) > 0 ? implode(", ", $serieslinks) : _NONE));
	$tpl->assign("characters", ($stories['charid'] ? charlist($stories['charid']) : _NONE));
	
	$tpl->assign("category",  $stories['catid'] == '-1' || !$stories['catid'] ? _ORPHAN : catlist($stories['catid']));
	$tpl->assign("completed"   , ($stories['completed'] ? _YES : _NO) );
	$tpl->assign("roundrobin"   , ($stories['rr'] ?  (!empty($roundrobin) ? $roundrobin : "<img src=\"images/roundrobin.gif\" alt=\""._ROUNDROBIN."\">") : "") );
	$tpl->assign("ratingpics"   , ratingpics($stories['rating']) );
	$tpl->assign("reviews"   , ($reviewsallowed ? "<a href=\"".e_HTTP."reviews.php?type=ST&amp;item=".$stories['sid']."\">"._REVIEWS."</a>" : "") );
	if(isMEMBER && !empty($favorites)) 
		$tpl->assign("addtofaves", "[<a href=\"".e_HTTP."member.php?action=favst&amp;add=1&amp;sid=".$stories['sid']."\">"._ADDSTORY2FAVES."</a>] [<a href=\"".e_HTTP."member.php?action=favau&amp;add=".$stories['uid'].(count($stories['coauthors']) ? ",".implode(",", array_keys($stories['coauthors'])) : "")."\">"._ADDAUTHOR2FAVES."</a>]");
	
	$numchapsquery = dbquery("SELECT count(sid) FROM ".TABLEPREFIX."fanfiction_chapters WHERE sid = '".$stories['sid']."' AND validated > 0");
	list($chapters) = dbrow($numchapsquery);
	$tpl->assign("numchapters", $chapters );

	$tpl->assign("updated"   , date("$dateformat", $stories['updated']) );
	$tpl->assign("published"   , date("$dateformat", $stories['date']) );
	if(!empty($recentdays)) {
		$recent = time( ) - ($recentdays * 24 * 60 *60);
		if($stories['updated'] > $recent) $tpl->assign("new", isset($new) ? file_exists(e_HTTP.$new) ? "<img src='$new' alt='"._NEW."'>" : $new : _NEW);
	}
	$tpl->assign("wordcount"   , $stories['wordcount'] ? $stories['wordcount'] : "0" );
	$tpl->assign("numreviews"   , ($reviewsallowed == "1" ? "<a href=\"".e_HTTP."reviews.php?type=ST&amp;item=".$stories['sid']."\">".$stories['reviews']."</a>" : "") );
	if((isADMIN && uLEVEL < 4) || USERUID == $stories['uid'] || (is_array($stories['coauthors']) && array_key_exists(USERUID, $stories['coauthors'])))
		$adminlinks .= "[<a href=\"".e_HTTP."stories.php?action=editstory&amp;sid=".$stories['sid'].(isADMIN ? "&amp;admin=1" : "")."\">"._EDIT."</a>] [<a href=\"".e_HTTP."stories.php?action=delete&amp;sid=".$stories['sid'].(isADMIN ? "&amp;admin=1" : "")."\">"._DELETE."</a>]";
	global $featured;
	if($stories['featured'] == 1) {
		$tpl->assign("featuredstory", (isset($featured) ? $featured : "<img src=\"".e_HTTP."images/blueribbon.gif\" class=\"featured\" alt=\""._FSTORY."\">"));
		$tpl->assign("featuredtext", _FSTORY);
		if(isADMIN && uLEVEL < 4) $adminlinks .= " ["._FEATURED.": <a href=\"".e_HTTP."admin.php?action=featured&amp;retire=".$stories['sid']."\">"._RETIRE."</a> | <a href=\"".e_HTTP."admin.php?action=featured&amp;remove=".$stories['sid']."\">"._REMOVE."</a>]";
	}
	else if($stories['featured'] == 2) {
		$tpl->assign("featuredstory", (isset($retired) ? $retired : "<img src=\"".e_HTTP."images/redribbon.gif\"align=\"left\" class=\"retired\" alt=\""._PFSTORY."\">"));
		$tpl->assign("featuredtext", _PFSTORY);
		if(isADMIN && uLEVEL < 4) $adminlinks .= " [<a href=\"".e_HTTP."admin.php?action=featured&amp;remove=".$stories['sid']."\">"._REMOVE."</a>]";
	}
	else if(isADMIN && uLEVEL < 4) $adminlinks .= " [<a href=\"".e_HTTP."admin.php?action=featured&amp;feature=".$stories['sid']."\">"._FEATURED."</a>]";
	$tpl->assign("toc", "<a href=\"".e_HTTP."viewstory.php?sid=".$stories['sid']."&amp;index=1\">"._TOC."</a>");
	$tpl->assign("oddeven", ($count % 2 ? "odd" : "even"));
	$tpl->assign("reportthis", "[<a href=\"".e_HTTP."report.php?action=report&amp;url=viewstory.php?sid=".$stories['sid']."\">"._REPORTTHIS."</a>]");
	if(isADMIN && uLEVEL < 4) $tpl->assign("adminlinks", "<div class=\"adminoptions\"><span class='label'>"._ADMINOPTIONS.":</span> ".$adminlinks."</div>");
	else if(isMEMBER && (USERUID == $stories['uid'] || array_key_exists(USERUID, $stories['coauthors']))) $tpl->assign("adminlinks", "<div class=\"adminoptions\"><span class='label'>"._OPTIONS.":</span> ".$adminlinks."</div>");
	$count++;
?>