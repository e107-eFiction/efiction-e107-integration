<?php
error_reporting(0);
 
 
if (!defined('e107_INIT'))
{
	require_once(__DIR__.'/../../../class2.php');
}
 
e107::lan('efiction');

header("Content-Type: text/javascript; charset=utf-8",true);
include("../includes/queries.php");

$catid = isset($_GET['catid']) && preg_match("/^[0-9]+$/", $_GET['catid']) ? $_GET['catid'] : -1;

$catsquery = "SELECT * FROM #fanfiction_categories WHERE parentcatid = '$catid' OR catid = '$catid' ORDER BY leveldown, displayorder";

$records = e107::getDb()->retrieve($catsquery, true);

echo "var el = '".$_GET['element']."';\n";
$x = 0;
 
foreach($records AS $category)  {
    //$category_title =urlencode(str_replace($find, $replace, stripslashes($category['category']))); 
	$category_title  = e107::getParser()->toText($category['category']);
    echo "categories[$x] = new category(".$category['parentcatid'].", ".$category['catid'].", \"".$category_title."\", ".$category['locked'].", ".$category['displayorder'].");\r\n";
	$x++;
}
 