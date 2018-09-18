<?php
namespace controller;
class GetVariables {
private $view;
private $registerView;
private $userdb;
public function __construct(\view\LoginView $view, \view\RegisterView $registerView, \model\Userdb $userdb) {
$this->view = $view;
$this->registerView = $registerView;
$this->userdb = $userdb;
}
public function getCredentials()
{
    $this->userdb->setUpToDb($this->registerView->getRequestRegUserName());
    $this->userdb->hashPassword($this->registerView->getRequestRegPassword());
}

}