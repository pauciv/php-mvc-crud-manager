<?php
//$documentRoot = dirname(__FILE__);
$documentRoot = getcwd();

//BASE PATH -> FOR REFERENCE FILES
define("BASE_PATH", $documentRoot);

//BASE URL -> FOR LINK CSS & JS
$protocol = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
$domain = $_SERVER['HTTP_HOST'];
define('BASE_URL', preg_replace("/\/$/", '', $protocol . $domain . str_replace(array('\\', "index.php", "index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))), 1) . '/');
