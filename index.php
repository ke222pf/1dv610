<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/GetVariables.php');
require_once('model/UserException.php');
require_once('model/Userdb.php');
require_once('view/RegisterView.php');
require_once('model/ConnectDb.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$ctdb = new \model\ConnectDb();
$db = new \model\Userdb();
$ue = new \model\UserException();
$v = new \view\LoginView($ue);
$rv = new \view\RegisterView($ue, $ctdb);
$gv = new \controller\GetVariables($v, $rv, $db);
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();
$lv->render(false, $dtv, $v, $rv);
// $v->response();
$gv->getCredentials();

