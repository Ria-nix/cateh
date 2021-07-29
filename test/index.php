<?php 
include_once('cooler_helpers.php');
include_once('MySQL.php');
include_once('CategoriesInfo.php');


$categories = new CategoriesInfo(\artemy_helper\getLink("u1184374_hepdesk_2_0"));
$all_categories = $categories->fetch();
var_dump($all_categories);