<!-- Index.php is always the key route, each page through the website is routed to this page, this page then creates
A array of directories stored using constants, these constants are then used to quickly access the correct directory
for the main entry point class(Application.php) The class then uses the URL to access the correct class and method to
load to the user
 -->

<?php


define('WORKSPACE', dirname(__DIR__) . '/');
define('APP', WORKSPACE . 'app/');
define('CLASSES', WORKSPACE . 'app/Classes/');
define('CONTROLLER', WORKSPACE . 'app/FransFurniture/Controller/');
define('MODEL', WORKSPACE . 'app/FransFurniture/Model/');
define('VIEW', WORKSPACE . 'app/FransFurniture/View/');

$directories = [WORKSPACE, APP, CLASSES, CONTROLLER, MODEL, VIEW];

set_include_path(get_include_path() . ':' . implode(':', $directories));
spl_autoload_register('spl_autoload', false);

new Application();





