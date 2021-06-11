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
require_once(__DIR__ . '/../../class2.php');

if(!getperms('P'))
{
	e107::redirect();
	exit;
}

  
$sql = e107::getDb();

require_once(e_ADMIN."auth.php");

$currentStep = 1 ;

e107::lan('efiction');
e107::lan('efiction', true);
e107::lan('efiction', 'install' );

if(isset($_GET['step']))
{
	//	$action = key($_POST['nextStep']);
	$currentStep = intval($_GET['step']);
}
if(isset($_GET['sect']))
{
	//	$action = key($_POST['nextStep']);
	$sect= e107::getParser()->toDb($_GET['sect']);  
}


if(function_exists('step' . $currentStep))
{
	$result = call_user_func('step' . $currentStep, $sect);
}

 
require(e_ADMIN . 'footer.php');

function info_message($message = '') {
	$text = '<div class="s-message"><div class=" alert alert-success"><div class="s-message-body">'.$message.'</div></div>';

	return $text;
}

function step2($sect) {
 
	$sitekey = e107::getInstance()->getSitePath();
	if(e107::getDb()->isTable('fanfiction_settings')) {
		$output = info_message('Your table '.MPREFIX.'fanfiction_settings already exists.');
		e107::getRender()->tablerender('',     $output);  
		$output = '';
		include(e_PLUGIN."efiction/admin/settings.php");

		e107::getRender()->tablerender($caption,   $output); 
	}
}


function step1() {

	global $mySQLserver, $mySQLdefaultdb, $mySQLuser, $E107_CONFIG ;

	$sitekey = e107::getInstance()->getSitePath();

	$output .= info_message('All settings were managed by e107 during its installation. This is just overview of them.');
	$output .= '<div class="table-responsive">
	<table class="table table-bordered" style="background: transparent"><thead><th width="200">'._CONFIGDATA.'</th><th width="200">Value</th><th>Help</th></thead>
	<tbody>';
	$output .= '<tr><td>'._DBHOST.'</td><td>'.$mySQLserver.'</td><td>'._HELP_DBHOST.'</td></tr>';
	$output .= '';
	$output .= '<tr><td>'._DBNAME.'</td><td>'.$mySQLdefaultdb.'</td><td>'._HELP_DBNAME.'</td></tr>'; 
	$output .= '<tr><td>'._DBUSER.'</td><td>'.$mySQLuser.'</td><td>'._HELP_DBUSER.'</td></tr>'; 
	$output .= '<tr><td>'._DBPASS.'</td><td> *** </td><td>'._HELP_DBPASS.'</td></tr>'; 
	$output .= '<tr><td>'._SITEKEY.'</td><td>'.$sitekey.'</td><td>'._HELP_INSTALL_SITEKEY.'</td></tr>'; 
	$output .= '<tr><td>'._LANGUAGE.'</td><td>'.e_LANGUAGE.'</td><td>'._HELP_LANGUAGE.'</td></tr>'; 
	$output .= '<tr><td>'._SETTINGSPREFIX.'</td><td>'.e107::getDB()->mySQLPrefix.'</td><td>'._HELP_SETTINGSPREFIX.'</td></tr>'; 

	$output .= '</tbody></table></div>';
    e107::getRender()->tablerender('Step 1: Database and site settings ',     $output);           
}

function efiction_install_adminmenu()
{

	$action = 1;

	$var[1]['text'] = '1 - Database settings';
	$var[1]['link'] = e_SELF . "?step=1";

	$var[2]['text'] = '2 - Create settings table';
	$var[2]['link'] = e_SELF . "?step=2";

	$var[3]['text'] = '3 - Submissions';
	$var[3]['link'] =  e_SELF . "?step=2&sect=submissions";

	$var[4]['text'] = '4 - Move user data';
	$var[4]['link'] = '#';

	$var[5]['text'] = '5 - Migrate forum config';
	$var[5]['link'] = '#';

	$var[6]['text'] = '6 - Migrate threads/replies';
	$var[6]['link'] = '#';

	$var[7]['text'] = '7 - Recalc all counts';
	$var[7]['link'] = '#';

	$var[8]['text'] = '8 - Calc lastpost data';
	$var[8]['link'] = '#';

	$var[9]['text'] = '9 - Migrate any poll data';
	$var[9]['link'] = '#';

	$var[10]['text'] = '10 - Migrate any attachments';
	$var[10]['link'] = '#';

	$var[11]['text'] = '11 - Delete old attachments';
	$var[11]['link'] = '#';

	$var[12]['text'] = '12 - Delete old forum data';
	$var[12]['link'] = '#';

	if(E107_DEBUG_LEVEL)
	{
		$var[13]['divider'] = true;

		$var[14]['text'] = 'Reset';
		$var[14]['link'] = e_SELF . "?reset";

		$var[15]['text'] = 'Reset to 3';
		$var[15]['link'] = e_SELF . "?step=3&reset=3";

		$var[16]['text'] = 'Reset to 6';
		$var[16]['link'] = e_SELF . "?step=6&reset=6";

		$var[17]['text'] = 'Reset to 7';
		$var[17]['link'] = e_SELF . "?step=7&reset=7";

		$var[18]['text'] = 'Reset to 10';
		$var[18]['link'] = e_SELF . "?step=10&reset=10";

	}


	if(isset($_GET['step']))
	{
		//	$action = key($_POST['nextStep']);
		$action = intval($_GET['step']);
	}

	show_admin_menu('Efiction Install', $action, $var);
}
