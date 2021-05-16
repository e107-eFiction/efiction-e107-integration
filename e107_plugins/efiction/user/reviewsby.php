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

if(!function_exists("catlist")) include(_BASEDIR."includes/listings.php");  //this file is not there...
 
$user_template = e107::getTemplate('efiction', 'user', 'reviewsby');

if(!isset($uid)) {  //why this would be possible?
	$uid = USERUID;
	$output .=  "<div id='pagetitle'>"._YOURREVIEWS."</div>";
	$reviewblock_title = e107::getParser()->parseTemplate($user_templatee['usertitle'], true, $var );
}
else {
	/* $authquery = dbquery("SELECT "._PENNAMEFIELD." FROM "._AUTHORTABLE." WHERE "._UIDFIELD." = '$uid'");
	list($penname) = dbrow($authquery); */
	$var['USER_PENNAME'] = $penname;
	$reviewblock_title = e107::getParser()->parseTemplate($user_template['title'], true, $var );
	 
}
/*
$revcount = dbxquery("SELECT COUNT(reviewid) FROM ".TABLEPREFIX."fanfiction_reviews WHERE uid = '$uid' AND review != 'No Review'");
list($reviewcount) = dbrow($revcount);
*/
$reviewcount = e107::getDb()->retrieve("SELECT COUNT(reviewid) AS reviewcount FROM ".TABLEPREFIX."fanfiction_reviews WHERE uid = '$uid' AND review != 'No Review'");
if($reviewcount) {

	/*$revquery = dbquery("SELECT rev.*, UNIX_TIMESTAMP(rev.date) as date, "._PENNAMEFIELD." FROM ".TABLEPREFIX."fanfiction_reviews as rev, "._AUTHORTABLE." WHERE rev.uid = "._UIDFIELD." AND rev.uid = '$uid' AND rev.review != 'No Review' ORDER BY type, item LIMIT $offset, $itemsperpage");
	
	*/

	$revquery = e107::getDb()->retrieve("SELECT rev.*, UNIX_TIMESTAMP(rev.date) as date, "._PENNAMEFIELD." FROM ".TABLEPREFIX."fanfiction_reviews as rev, "._AUTHORTABLE." WHERE rev.uid = "._UIDFIELD." AND rev.uid = '$uid' AND rev.review != 'No Review' ORDER BY type, item LIMIT $offset, $itemsperpage", true);
	$counter = 0;
	$count = 0;
 
	$reviewblock_template = e107::getTemplate('efiction', 'reviewblock', 'review');  
	$reviewblock_start = $user_template['start'];
	 
	foreach ($revquery as $reviews) {
		if(empty($lastreview)) $lastreview = array('type' => '', 'item' => '');
		$adminlink = "";
		$reviewblock_start = $user_template['start'];
		$reviewblock_item  = $reviewblock_template['item']; 
		
		if(isADMIN) $adminlink = _ADMINOPTIONS.": [<a href=\"reviews.php?action=edit&amp;reviewid=".$reviews['reviewid']."\">"._EDIT."</a>]";
		if( isADMIN || (USERUID && USERUID == $reviews['uid'])) $adminlink .= " [<a href=\"reviews.php?action=delete&amp;reviewid=".$reviews['reviewid']."\">"._DELETE."</a>]";
		 
		if($reviews['type'] == 'ST') {
			$stories = e107::getDB()->retrieve(_STORYQUERY." AND sid = '".$reviews['item']."' LIMIT 1");
			$authoruid = $stories['uid'];

			if($lastreview['type'] != 'ST' || $lastreview['item'] != $reviews['item']) {
				// include(_BASEDIR."includes/storyblock.php");
			}
			if($reviews['chapid']) {
				$chapquery = e107::getDB()->retrieve("SELECT title, inorder FROM ".TABLEPREFIX."fanfiction_chapters WHERE chapid = '".$reviews['chapid']."' LIMIT 1");
				$chaptitle = $chapquery['title'];
				$chapnum = $chapquery['inorder'];
				 
			}
		}
		else if($reviews['type'] == "SE" && ($lastreview['type'] != 'SE' || $lastreview['item'] != $reviews['item'])) {
			$stories = e107::getDB()->retrieve(_SERIESQUERY." AND seriesid = '".$reviews['item']."' LIMIT 1");
			$authoruid = $stories['uid'];
			$key = 'reviewblock';
			$reviewblock_start = $user_template['firstitem'];
			include(_BASEDIR."inc/seriesblock.php");
			$reviews['listing'] = $seriesblock;
			$reviewblock_item  = $reviewblock_template['firstitem'];
			
		}
		else { 
			$codeblocks = dbquery("SELECT * FROM ".TABLEPREFIX."fanfiction_codeblocks WHERE code_type = 'reviewsby'");
			while($code = dbassoc($codeblocks)) {
				eval($code['code_text']);
			}
		}	

		if(isADMIN) $adminlink = _ADMINOPTIONS.": [<a href=\"reviews.php?action=edit&amp;reviewid=".$reviews['reviewid']."\">"._EDIT."</a>]";
		if( isADMIN || (USERUID && USERUID == $reviews['uid'])) $adminlink .= " [<a href=\"reviews.php?action=delete&amp;reviewid=".$reviews['reviewid']."\">"._DELETE."</a>]";
		 
		if($reviews['uid']) {
			if(USERUID == $reviews['uid'] && $revdelete == 2 && !isADMIN) $adminlink .= " [<a href=\"reviews.php?action=delete&amp;reviewid=".$reviews['reviewid']."\">"._DELETE."</a>]";
			$reviewer = "<a href=\"viewuser.php?uid=".$reviews['uid']."\">".$reviews['reviewer']."</a>";
			$member = _MEMBER;
		}
		else {
			if(USERUID == $authoruid && $revdelete && !isADMIN) $adminlink .= " [<a href=\"reviews.php?action=delete&amp;reviewid=".$reviews['reviewid']."\">"._DELETE."</a>]";
			$reviewer = $reviews['reviewer'];
			$member = _ANONYMOUS;
		}
		if(!empty($authoruid) && USERUID == $authoruid) $adminlink .= " [<a href=\"member.php?action=revres&amp;reviewid=".$reviews['reviewid']."\">"._RESPOND."</a>]";

		$reviews['member'] = $member;
		$reviews['reviewer'] = $reviewer;
		$reviews['chapter'] = (isset($chaptitle) ? _CHAPTER." $chapnum: $chaptitle" : (!empty($stories['title']) ? $stories['title'] : _NONE));
		$reviews['chapternumber'] = isset($chapnum) ? $chapnum : "";
		$reviews['oddeven'] = ($counter % 2 ? "odd" : "even");
		$reviews['adminoptions'] = (!empty($adminlink)) ? "<div class=\"adminoptions\">$adminlink</div>" : "";
 
		$sc_reviewblock = e107::getScBatch('reviewblock', 'efiction');
		$sc_reviewblock->wrapper('reviewblock/review');
		$sc_reviewblock->setVars($reviews);
		
		$reviewblock_items .= e107::getParser()->parseTemplate($reviewblock_item, true, $sc_reviewblock );
		$counter++;
		$lastreview = $reviews;
	}

	$reviewblock_end = $user_template['end'];

	$reviewblock_tablerender = varset($user_template['tablerender'], 'review');
	 
	$content = $reviewblock_start.$reviewblock_items.$reviewblock_end;
	$output = e107::getRender()->tablerender('', $reviewblock_title. $content, $reviewblock_tablerender, true); 
}
else {
	$output .= write_message(_NORESULTS);
}



 

/* 
	if($reviewcount > $itemsperpage) {
		$tpl->gotoBlock("_ROOT");
		$tpl->newBlock("listings");
		$tpl->assign("pagelinks", build_pagelinks(e_PAGE."?action=reviewsby&amp;uid=$uid&amp;", $reviewcount, $offset));
	}		
 	 
*/