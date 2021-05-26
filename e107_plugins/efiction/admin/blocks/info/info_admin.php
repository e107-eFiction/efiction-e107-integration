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

$block_key = 'info';
$content = "";
$blocks = efiction::get_block($block_key);
 
/* display currect preview */
include _BASEDIR.'blocks/'.$blocks[$block_key]['file'];
 
if(isset($_POST['submit'])) {
    if (!empty($_POST['block_variables'])) {      
            $blocks[$block_key]['block_variables'] = $_POST['block_variables'];
    } 
    save_blocks( $blocks );
	$output .= "<div class='alert alert-info text-center'>"._ACTIONSUCCESSFUL."</div>";	
}
 
$output .= "<div style='text-align: left;'><b>"._CURRENT.":</b><br />   
".(!empty($blocks[$block_key]['tpl']) ? LAN_EFICTION_NATPL : $content).'
<form method="POST" enctype="multipart/form-data" action="admin.php?action=blocks&amp;admin='.$block_key.'">';
$output .= '<table class="tblborder table table-bordered">';

$curVal = $blocks[$block_key]['block_variables'];

$frm = e107::getForm();
$optionpath = e_PLUGIN.'efiction/admin/blocks/'.$block_key.'/'.$block_key.'_options.php';

if(empty($blocks['info']['block_variables']['template']) && $curVal['style'] == 1) $curVal['template'] = _NARTEXT;
else if($curVal['style'] == 1)  $curVal['template'] = $blocks['info']['block_variables']['template'];
else $curVal['template'] = "";

if ((file_exists($optionpath))) {
	require_once $optionpath;
	$settings = $options;
}

if ($settings['fields'] > 0) {
	$nameitem = 'block_variables';
	foreach ($settings['fields'] as $fieldkey => $field) {
		$text .= '<tr><td >'.$field['title'].': </td><td>';
		$text .= $frm->renderElement($nameitem.'['.$fieldkey.']', $curVal[$fieldkey], $field);
		$text .= '</td></tr>';
	}
} else {
}
$output .= $text ;
$output .= "</table>
<div class='text-center'><input type=\"submit\" name=\"submit\" class=\"button btn btn-submit btn-default btn-secondary\" id=\"submit\" value=\""._SUBMIT.'"></div></form></div> ';
 