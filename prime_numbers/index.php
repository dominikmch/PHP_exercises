<?php
require 'viewCreator.php';

$application_title = 'Prime Numbers!';
$webPage= new WebPageOutput();
$page= $webPage->generateWebpage($application_title);
echo $page;

