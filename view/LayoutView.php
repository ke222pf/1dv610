<?php

namespace view;
class LayoutView {
  private $dtv;
  private $v;
  private $rv;
  private $login;
  public function __construct(\view\DateTimeView $dtv, \view\LoginView $v, \view\RegisterView $rv, \model\Login $login) {
    $this->dtv = $dtv;
    $this->v = $v;
    $this->rv = $rv;
    $this->login = $login;

  }
  
  public function render() {
    $isLoggedIn = $this->login->userLoggedIn();
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
        <h1>Assignment 2</h1>
        '. $this->generateLink($isLoggedIn).'
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          ' . $this->registerUser() . '
          '. $this->afterReg() .'
          <div class="container">
              ' . $this->generateNewView() . '
              
              ' . $this->dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  public function renderIsLoggedIn($isLoggedIn) {
    if ($this->v->ifLoggedIn()) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  public function registerUser() {
    if(isset($_GET["register"])) {
      return '<h2> Register new user</h2>';
    } else {
      return "";
    }
  }
  public function generateLink ($isLoggedIn) {
    if($isLoggedIn) {

    } else {
      if(isset($_GET["register"])) {
        return '<a href="?">Back to login</a>';
      } else {
        return '<a href=?register>Register a new user</a>';
      }
    }
  }
  private function generateNewView() {
    if(isset($_GET['register'])) {
      return $this->rv->validateUserReg();
    } else {
      return $this->v->renderlogginForm();
    }
  }
  public function afterReg () {
    if ($this->rv->checkIfReg()) {
      return $this->v->renderlogginForm();
    }
  }
}

