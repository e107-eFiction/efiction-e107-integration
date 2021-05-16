<?php
// ----------------------------------------------------------------------
// eFiction 3.2
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

if (!defined('e107_INIT')) { exit; }

if(file_exists("$skindir/user.tpl")) $tpl = new TemplatePower( "$skindir/user.tpl" );
else $tpl = new TemplatePower(_BASEDIR."default_tpls/user.tpl");
if(file_exists("$skindir/listings.tpl")) $tpl->assignInclude( "listings", "$skindir/listings.tpl" );
else $tpl->assignInclude( "listings", _BASEDIR."default_tpls/listings.tpl" );
 
 
$numstories = e107::getDb()->retrieve("SELECT count(stories.sid) AS numstories FROM ".TABLEPREFIX."fanfiction_stories as stories LEFT JOIN ".TABLEPREFIX."fanfiction_coauthors as coauth ON stories.sid = coauth.sid WHERE validated > 0 AND (stories.uid = '$uid' OR coauth.uid = '$uid')");
 

$storiesby_template = e107::getTemplate('efiction', 'user', 'storiesby');
$var['USER_PENNAME'] = $penname;
$var['USER_SORT'] = $this->sc_user_sort(); 
 
$storiesby_title = e107::getParser()->parseTemplate($storiesby_template['title'], true, $var);  

if($numstories) {
	$count = 0;
  
	

	$storyquery = e107::getDb()->retrieve("SELECT stories.*, "._PENNAMEFIELD." as penname, UNIX_TIMESTAMP(stories.date) as date, UNIX_TIMESTAMP(stories.updated) as updated FROM ("._AUTHORTABLE.", ".TABLEPREFIX."fanfiction_stories as stories) LEFT JOIN ".TABLEPREFIX."fanfiction_coauthors as coauth ON coauth.sid = stories.sid WHERE "._UIDFIELD." = stories.uid AND stories.validated > 0 AND (stories.uid = '$uid' OR coauth.uid = '$uid') GROUP BY stories.sid "._ORDERBY." LIMIT $offset, $itemsperpage", true);

	$key = varset($key,'listings');  //supported: reviewblock
	$story_template = e107::getTemplate('efiction', $key, 'storyblock');
	$sc_story = e107::getScBatch('story', 'efiction');
	$sc_story->wrapper('story/story');

	foreach($storyquery AS $stories) {
		include(_BASEDIR."inc/storyblock.php");
		$storiesby['listing'] = $seriesblock;
	}
 /*
	$tpl->newBlock("listings");
	$storyquery = dbquery("SELECT stories.*, "._PENNAMEFIELD." as penname, UNIX_TIMESTAMP(stories.date) as date, UNIX_TIMESTAMP(stories.updated) as updated FROM ("._AUTHORTABLE.", ".TABLEPREFIX."fanfiction_stories as stories) LEFT JOIN ".TABLEPREFIX."fanfiction_coauthors as coauth ON coauth.sid = stories.sid WHERE "._UIDFIELD." = stories.uid AND stories.validated > 0 AND (stories.uid = '$uid' OR coauth.uid = '$uid') GROUP BY stories.sid "._ORDERBY." LIMIT $offset, $itemsperpage");
	
    while($stories = dbassoc($storyquery)) {   
		$tpl->newBlock("storyblock");
		include(_BASEDIR."includes/storyblock.php");
	}
	$tpl->gotoBlock("listings");
	if($numstories > $itemsperpage) $tpl->assign("pagelinks", build_pagelinks("viewuser.php?action=storiesby&amp;uid=$uid".(isset($_GET['sort']) ? ($_GET['sort'] == "alpha" ? "&amp;sort=alpha" : "&amp;sort=update") : "")."&amp;", $numstories, $offset));
	$tpl->gotoBlock("_ROOT");
	*/
 
	$profiler_tablerender = varset($template['tablerender'], 'profile');
	$output = e107::getRender()->tablerender('', $profile_title.'test', $profiler_tablerender, true); 
}
else $output .= write_message(_NORESULTS);
