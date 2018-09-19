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
require_once('model/Login.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$ctdb = new \model\ConnectDb();
$ue = new \model\UserException();
$l = new \model\Login($ctdb);
$v = new \view\LoginView($ue, $l);
$db = new \model\Userdb($ctdb);
$rv = new \view\RegisterView($ue, $db);
$gv = new \controller\GetVariables($v, $rv, $db, $l);
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();
// $isLoggedIn = $l->userLoggedIn();
$gv->getCredentials();
$lv->render($l->userLoggedIn(), $dtv, $v, $rv);
var_dump($l->userLoggedIn());
// $v->response();


