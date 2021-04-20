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

$countquery = dbquery(_SERIESCOUNT." WHERE uid = '$uid'");
list($numseries) = dbrow($countquery);
if($numseries) {
	$count = 0;
 
    $var['seriesheader'] = "<div class='sectionheader'>"._SERIESBY." $penname</div>";
    
    $template = e107::getTemplate('efiction', 'serieview', 'listing');
    $caption = e107::getParser()->simpleParse($template['caption'], $var); 
 
    $seriesquery = _SERIESQUERY." AND series.uid = '$uid' LIMIT $offset, $itemsperpage";
    $sresult = e107::getDb()->retrieve($seriesquery, true);
    foreach($sresult AS $stories)  { 
        $sc->setVars($stories);
        include(_BASEDIR."includes/seriesblock.php"); 
    }
    e107::getRender()->tablerender($caption, $start.$text.$end, $tablerender);
	 
	if($numseries > $itemsperpage) $tpl->assign("pagelinks", build_pagelinks("viewuser.php?action=seriesby&amp;uid=$uid&amp;", $numseries, $offset));
	$tpl->gotoBlock("_ROOT");
}
else $output .= write_message(_NORESULTS);
