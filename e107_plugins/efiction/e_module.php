<?php 
 
if (!defined('_BASEDIR')) define('_BASEDIR', e_PLUGIN.'efiction/');
if (!defined('TABLEPREFIX')) define('TABLEPREFIX', MPREFIX);

@ include_once(_BASEDIR."config.php");
if(empty($sitekey)) {
	header("Location: install/install.php");
	exit( );
}

/**************  DETECT THEME + SKIN HERE *************************************/
//in e_module is not defined USER
//in e_module is not defined LAYOUT
//in e_module is not defined e_CURRENT_PLUGIN

if(isset($_GET['skin'])) { //first priority 
	$siteskin = $_GET['skin'];
	e107::getSession()->set(SITEKEY."_skin", $siteskin);  
}
else { 
    if (e107::getSession()->is(SITEKEY.'_skin')) $siteskin = e107::getSession()->get(SITEKEY.'_skin');
}
 
//quests, user have it set in session too, list of supported themes 
$st = array("Epiphany", "Sommerbrise");
if (in_array($siteskin, $st)) {
 	 define('USERTHEME', $siteskin);
}
 
/**************  LOAD EFICTION SETTINGS ***************************************/    
$settingsresults = dbquery("SELECT * FROM ".$settingsprefix."fanfiction_settings WHERE sitekey = '".$sitekey."'");
$settings = dbassoc($settingsresults);
if(!defined("SITEKEY")) define("SITEKEY", $settings['sitekey']);
unset($settings['sitekey']);

unset($settings['tableprefix']);
define("STORIESPATH", $settings['storiespath']);
unset($settings['storiespath']);
foreach($settings as $var => $val) {
	$$var = stripslashes($val);
	$settings[$var] = htmlspecialchars($val);
}

$defaultskin = $settings['skin']; //used in get_session_vars.php
$skin = $settings['skin']; //used for authorprefs


/**************  DETECT SKIN FOLDER       *************************************/
if(varset($siteskin) && is_dir(_BASEDIR."skins/$siteskin")) { 
	$skindir = _BASEDIR."skins/$siteskin";
	$skinfolder = "skins/$siteskin";
}
elseif(varset($defaultskin) && is_dir(_BASEDIR."skins/$defaultskin")) {
	$skindir = _BASEDIR."skins/".$defaultskin;
	$skinfolder = "skins/".$defaultskin;    
}
else { 
	$skindir = _BASEDIR."default_tpls";
	$skinfolder = "default_tpls";
}
 
 
