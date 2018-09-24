<?php
namespace controller;
class GetVariables {
private $view;
private $registerView;
private $userdb;
private $login;
private $lv;
public function __construct(\view\LoginView $view, \view\RegisterView $registerView, \model\Userdb $userdb, \model\Login $login, \view\LayoutView $lv) {
$this->view = $view;
$this->registerView = $registerView;
$this->userdb = $userdb;
$this->login = $login;
$this->lv = $lv;
}
public function route () {
session_start();
if($this->registerView->getRequestRegUserName() && $this->registerView->getRequestRegPassword()) {
$this->regUser();
} else {
    $this->login();
}
}
public function regUser()
{
    // echo "regUSer";
    // if($this->registerView->getRequestRegUserName() && $this->registerView->getRequestRegPassword()) {
        $this->userdb->getUserCredentials($this->registerView->getRequestRegUserName(), $this->registerView->getRequestRegPasswordConformation(), $this->registerView->getRequestRegPassword());
        // $this->registerView->validateUserReg();
        // $this->registerView->checkPass word();
        $this->registerView->validateUserReg();
        $this->userdb->setUpToDB();
        // $this->registerView->response();
        // $this->registerView->checkname();
        // $this->lv->render($this->login->userLoggedIn());
        // $this->registerView->validateUserReg();
    // }
    
}
public function login() {
        $this->login->getCredentials($this->view->getRequestUserName(), $this->view->getRequestPassword());
        $this->login->match();
        $this->view->response();
        $this->view->validateLogin();
        //    $this->view->renderlogginForm();
        //    $this->lv->render($this->login->userLoggedIn());

          
        // $this->view->validateLogin();
}


}