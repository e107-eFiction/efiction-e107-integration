<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

e107::lan('efiction');
e107::lan('efiction', true);

require_once(e_ADMIN."auth.php");
require_once("inc/get_session_vars.php");

require_once(_BASEDIR."includes/queries.php"); //TEMP Fix header.php and pagesetup.php

$action = '';
 
if(isset($_GET['action']))
{
	$action = e107::getParser()->filter($_GET['action'], 'str');
} 

if(isset($_GET['rid']))
{
	$par = e107::getParser()->filter($_GET['rid'], 'int'); 
}

if(empty($action)) {
	$result = call_user_func('main', $par);

}
elseif(function_exists($action))
{
	$result = call_user_func($action, $par);
}

function main($action) {
    

	$ns = e107::getRender();
    $vals = efiction_panels::get_adminarea_panels();

	foreach($vals AS $val) {
		$tmp = e107::getNav()->renderAdminButton($val['link'], $val['title'], $val['caption'], $val['perms'], $val['icon_32'], "div") ;
		$mainPanel .= $tmp;
				
	}

	e107::getRender()->tablerender($caption,   $mainPanel); 

}

function ratings($rid = NULL) {
  
	$output = '';
	include(e_PLUGIN."efiction/admin/ratings.php");

	e107::getRender()->tablerender($caption,   $output); 

}
 

require(e_ADMIN . 'footer.php');


function admin_config_adminmenu()
{
	$action = 1;

	$panellist = efiction_panels::get_adminmenu_panels(); 

    foreach($panellist AS $panel) {

	}
	if(isset($_GET['action'])  ) {
		$active = e107::getParser()->toDb($_GET['action']);  ;
	}
    show_admin_menu(_ADMIN, $action, $panellist);
}