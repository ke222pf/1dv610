<?php

namespace view;
class LayoutView {
  private $dtv;
  private $v;
  private $rv;
  public function __construct(\view\DateTimeView $dtv, \view\LoginView $v, \view\RegisterView $rv) {
    $this->dtv = $dtv;
    $this->v = $v;
    $this->rv = $rv;

  }
  
  public function render($isLoggedIn) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
        <h1>Assignment 2</h1>
        '. $this->generateLink($isLoggedIn).'
          ' . $this->renderIsLoggedIn() . '
          <div class="container">
              ' . $this->generateNewView() . '
              
              ' . $this->dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn() {
    if ($this->v->ifLoggedIn()) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  private function generateLink ($isLoggedIn) {
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
    if(!empty($_GET['register'])) {
      return $this->rv->renderlogginForm();
    } else {
      return $this->v->renderlogginForm();
    }
  }
}
