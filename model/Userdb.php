<?php
namespace model;
require_once('model/ConnectDb.php');
class Userdb {
    public function setUpToDB ($usernameReg) {
        $db = new \model\ConnectDb();
        $sql = "INSERT INTO users(name, password) VALUES(:name, :password)";
        
    }
    private function hashPassword($passwordReg) {
       return $hashed_password = password_hash($passwordReg, PASSWORD_BCRYPT);
    }
}