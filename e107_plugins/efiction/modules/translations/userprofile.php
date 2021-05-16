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
 




/*  NOTE: created just for testing shortcodes, not used in live */ 
/* codeblock record was added manually to database */

global $language;
    
if(file_exists(_BASEDIR."modules/translations/languages/{$language}.php")) include_once(_BASEDIR."modules/translations/languages/{$language}.php");
else include_once(_BASEDIR."modules/translations/languages/en.php");


 //username
$username = $this->var['user']['user_loginname']; //todo check what field is used for alt_auth
 
if(e107::getDb()->isTable('unnuke_users')) {
    $codequery = "SELECT user_regdate FROM #unnuke_users WHERE username LIKE '".$username."' LIMIT 1" ;
    $regdate = e107::getDb()->retrieve($codequery );  // created with $user_regdate = date("M d, Y");
 
    if($regdate) {
      $regtime = strtotime($regdate);
      
      $memberdays = max(1, round( ( time() - $regtime ) / 86400 ));
      $registration =  e107::getDate()->convert_date($regtime, "forum");
      $output .=  "You are member of our main site for: " . $memberdays . " days from ". $registration;
    }
    else {
       $output .= '<div class="ue-label col-12">You are not member with nickname: '.$username.'</div>';
    }

}
 


?>