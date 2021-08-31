<?php 
 
if (!defined('_BASEDIR')) define('_BASEDIR', e_PLUGIN.'efiction/');
if (!defined('TABLEPREFIX')) define('TABLEPREFIX', MPREFIX);
if (!defined('SITEKEY'))  define('SITEKEY', $e107->site_path);
 
require_once(_BASEDIR."includes/dbfunctions.php");
 
/*
if(empty($sitekey)) {
	header("Location: install/install.php");
	exit( );
}
*/

if(e_ADMIN_AREA === true)  {}  //USER_AREA is not defined
else { 
     
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
    	 define("USERTHEME", $siteskin);
  }
 
   /* LOAD CLASSES */
  e107::getSingleton('efiction_blocks', e_PLUGIN.'efiction/classes/blocks.class.php');
  e107::getSingleton('efiction_pagelinks', e_PLUGIN.'efiction/classes/pagelinks.class.php');
  e107::getSingleton('efiction_settings', e_PLUGIN.'efiction/classes/settings.class.php');
  
  /**************  LOAD EFICTION SETTINGS ***************************************/    
  $settings = efiction_settings::get_settings();
  
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
   
   

  
 }
 
 