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

if (!defined('e107_INIT')) {
    exit;
}

// Adds the categories selection section to a form.

if (!isset($catid)) {
    $catid = array();
}

$output .= "<div><label for='catoptions'>"._CATOPTIONS.'</label> <br />';

$rows = e107::getDb()->retrieve('fanfiction_categories', '*', true, true);
foreach ($rows as $row) {
	$categories[$row['catid']] = $row['category'];
}

$options = array('title' => _SELECTCATS, 'inline' => true,  'useKeyValues' => 1);

$output .= e107::getForm()->checkboxes('catid', $categories, $catid, $options);

$output .= '

</div>';
