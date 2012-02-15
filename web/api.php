<?php

ini_set('display_errors', 'on');

//Global includes

require_once ('propel/Propel.php');

// Initialize Propel with the runtime configuration
Propel::init("../api/model/build/conf/simply-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path("../api/model/build/classes" . PATH_SEPARATOR . get_include_path());

require_once('../api/includes/definitions.php');
require_once('../api/includes/actions.php');
require_once('../api/includes/global.php');




$global = new controller();


?>