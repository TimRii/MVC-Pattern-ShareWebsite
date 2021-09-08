<?php //Verstanden
// Start Session
session_start();

// Include Config
require('config.php');


//classes
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

//controllers
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

//views
require('models/home.php');
require('models/share.php');
require('models/user.php');

// Start
$bootstrap = new Bootstrap($_GET); // im Get steht controller="" action="" id=""
$controller = $bootstrap->createController(); //siehe Controller.php
if($controller){
	$controller->executeAction();
}