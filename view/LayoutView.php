<?php

namespace view;
class LayoutView {
  
  public function render($isLoggedIn, \view\DateTimeView $dtv, \view\LoginView $v, \view\RegisterView $rv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
        <h1>Assignment 2</h1>
        '. $this->generateLink().'
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          <div class="container">
              ' . $this->generateNewView($v, $rv) . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  private function generateLink () {
    if(isset($_GET["register"])) {
      return '<a href="?">Go back</a>';
    } else {
      return '<a href=?register>Register a new user</a>';
    }
  }
  private function generateNewView($v, $rv) {
    if(isset($_GET['register'])) {
      return $rv->response();
    } else {
      return $v->response();
    }
  }
}
