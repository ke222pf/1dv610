<?php
namespace model;
class login {
private $name;
private $password;
private $connectDb;
private $checkUser;
public function __construct(\model\ConnectDb $connectDb) {
    $this->connectDb = $connectDb;
}
    public function getCredentials($name, $password) {
       $this->name = $name;
       $this->password = $password;
    }
    // SOURCE:  https://www.youtube.com/watch?v=bjT5PJn0Mu8
    public function match() {
        $getConnection = $this->connectDb->createConnection();
        $getUsername = $getConnection->prepare('SELECT id, name, password FROM users WHERE name=:name');
        $getUsername->bindParam(':name', $this->name);
        $getUsername->execute();
        $matchUser = $getUsername->fetch();
        if($matchUser && password_verify($this->password, $matchUser['password'])) {
            $this->checkUser = true;
        } else {
            $this->checkUser = false;
        }
    }
    public function userLoggedIn () {
        return $this->checkUser;
    }
}