<?php
namespace controller;
class GetVariables {
private $view;
private $handleUserCredentials;
private $registerView;
private $userdb;

public function __construct(\view\LoginView $view, \model\HandleUserCredentials $handleUserCredentials, \view\RegisterView $registerView, \model\Userdb $userdb) {
$this->view = $view;
$this->handleUserCredentials = $handleUserCredentials;
$this->registerView = $registerView;
$this->userdb = $userdb;
}
public function getCredentials()
{
    $this->handleUserCredentials->hashPassword($this->view->getRequestUserName(), $this->view->getRequestPassword());

}

}