<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Forum upgrade routines
 *
 */

if(!defined('e_ADMIN_AREA'))
{
	define('e_ADMIN_AREA', true);
}
require_once(__DIR__ . '/../../../class2.php');

if(!getperms('P'))
{
	e107::redirect();
	exit;
}

  
$sql = e107::getDb();

require_once(e_ADMIN."auth.php");
 

e107::lan('efiction');
e107::lan('efiction', true);
e107::lan('efiction', 'install' );
 
if(isset($_GET['sect']))
{
	//	$action = key($_POST['nextStep']);
	$sect= e107::getParser()->toDb($_GET['sect']);  
}


if(function_exists('settings'))
{
	$result = call_user_func('settings', $sect);
}

 
require(e_ADMIN . 'footer.php');

function danger_message($message = '') {
	$text = '<div class="s-message"><div class=" alert alert-danger"><div class="s-message-body">'.$message.'</div></div>';

	return $text;
}

function settings($sect) {
 
	$sitekey = e107::getInstance()->getSitePath();
	if(!e107::getDb()->isTable('fanfiction_settings')) {
		$output = danger_message('Your table '.MPREFIX.'fanfiction_settings already exists.');
		e107::getRender()->tablerender('',     $output);
	}  

	$output = '';
	include(e_PLUGIN."efiction/admin/settings.php");

	e107::getRender()->tablerender($caption,   $output); 

}

 

function admin_settings_adminmenu()
{
/*
	$output .= "<h1>"._SETTINGS."</h1><div style='text-align: center;'>
 
 
	<a href='admin.php?action=censor'>"._CENSOR."</a> <br />
	<a href='admin.php?action=messages&message=welcome'>"._WELCOME."</a> | 
	<a href='admin.php?action=messages&message=copyright'>"._COPYRIGHT."</a> | 
	<a href='admin.php?action=messages&message=printercopyright'>"._PRINTERCOPYRIGHT."</a> | 
	<a href='admin.php?action=messages&message=tinyMCE'>"._TINYMCE."</a> | 
	<a href='admin.php?action=messages&message=nothankyou'>"._NOTHANKYOU."</a> | 
	<a href='admin.php?action=messages&message=thankyou'>"._THANKYOU."</a><br />";
	$settingsquery = dbquery("SELECT * FROM ".TABLEPREFIX."fanfiction_panels WHERE panel_type = 'AS' ORDER BY panel_title");
	while($os = dbassoc($settingsquery)) {
		if($os['panel_url']) $othersettings[] = "<a href='".$os['panel_url']."'>".$os['panel_title']."</a>";
	}
	if(isset($othersettings)) $output .= implode(" | ", $othersettings);
$output .= "</div> ";
*/
	$sect = 'main';

	$var['main']['text'] = _MAINSETTINGS;
	$var['main']['link'] = e_SELF . "?sect=main";

	$var['submissions']['text'] = _SUBMISSIONSETTINGS;
	$var['submissions']['link'] = e_SELF . "?sect=submissions";

	$var['sitesettings']['text'] = _SITESETTINGS;
	$var['sitesettings']['link'] =  e_SELF . "?sect=sitesettings";

	$var['display']['text'] = _DISPLAYSETTINGS;
	$var['display']['link'] = e_SELF . "?sect=display";

	$var['reviews']['text'] = _REVIEWSETTINGS;
	$var['reviews']['link'] = e_SELF . "?sect=reviews";

	$var['useropts']['text'] = _USERSETTINGS;
	$var['useropts']['link'] = e_SELF . "?sect=useropts";

	$var['email']['text'] = _EMAILSETTINGS;
	$var['email']['link'] = e_SELF . "?sect=email";
 
	if(isset($_GET['sect']))
	{
		$action =  e107::getParser()->toDb($_GET['sect']);  
	}

	show_admin_menu(_SETTINGS, $action, $var);
}
