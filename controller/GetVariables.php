<?php
namespace controller;
class GetVariables {
private $view;
private $handleUserCredentials;

public function __construct(\view\LoginView $view, \model\HandleUserCredentials $handleUserCredentials) {
$this->view = $view;
$this->handleUserCredentials = $handleUserCredentials;
}
public function getCredentials()
{
    // $this->view->getRequestUserName();
    // $this->view->getRequestPassword();
    $this->handleUserCredentials->hashPassword($this->view->getRequestUserName(), $this->view->getRequestPassword());
    // echo $this->view->getRequestUserName() . " " . $this->view->getRequestPassword();
    // $this->userException->ValidateUserCredentials($this->view->getRequestUserName(), $this->view->getRequestPassword());
}

}