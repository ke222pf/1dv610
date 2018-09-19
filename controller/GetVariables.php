<?php
namespace controller;
class GetVariables {
private $view;
private $registerView;
private $userdb;
private $login;
public function __construct(\view\LoginView $view, \view\RegisterView $registerView, \model\Userdb $userdb, \model\Login $login) {
$this->view = $view;
$this->registerView = $registerView;
$this->userdb = $userdb;
$this->login = $login;
}
public function getCredentials()
{
    if($this->registerView->getRequestRegUserName() && $this->registerView->getRequestRegPassword()) {
        $this->userdb->getUserCredentials($this->registerView->getRequestRegUserName(), $this->registerView->getRequestRegPasswordConformation());
        $this->userdb->hashPassword($this->registerView->getRequestRegPassword());
        $this->userdb->setUpToDB();
    }
    if($this->view->getRequestUserName() && $this->view->getRequestPassword()) {
        $this->login->getCredentials($this->view->getRequestUserName(), $this->view->getRequestPassword());
        $this->login->match();
    }
}

}