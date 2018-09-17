<?php
namespace controller;
class GetVariables {
private $view;
public function __construct(\view\LoginView $view) {
$this->view = $view;
}
public function run() {
    $this->getCredentials();
    return $this->view->response();
} 
public function getCredentials()
{
    $this->view->getRequestUserName();
    $this->view->getRequestPassword();
    echo $this->view->getRequestPassword() . " " . $this->view->getRequestUserName();
}



}