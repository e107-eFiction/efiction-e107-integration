<?php 
if(!defined("_CHARSET")) exit( );

 
$listOpts .= "<option value=\"authors.php?".($let ? "let=$let&amp;" : "")."list=beta\"".($list == "beta" ? " selected" : "").">$field_title</option>";
if($list == "beta") { 

	$countquery = "SELECT COUNT(DISTINCT ai.uid) FROM ".TABLEPREFIX."user_extended as ai, 
    ".TABLEPREFIX."fanfiction_authors AS author WHERE ai.user_plugin_efiction_betareader = 'LAN_YES' AND author.uid = ai.uid".(isset($letter) ? " AND $letter" : "");
    
	$authorquery = "SELECT ap.stories as stories, 
    author.penname  as penname, 
    author.uid as  user_extended_id FROM ".TABLEPREFIX."user_extended as ai, 
    ".TABLEPREFIX."fanfiction_authors AS author LEFT JOIN ".TABLEPREFIX."fanfiction_authorprefs AS ap ON "._UIDFIELD." = ap.uid 
    WHERE ai.user_plugin_efiction_betareader = 'LAN_YES'  AND author.uid = ai.user_extended_id ".(isset($letter) ? " AND $letter" : "")." GROUP BY "._UIDFIELD;
 
    $pagetitle .= $field_title;
}

?>