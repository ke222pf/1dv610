<?php
namespace model;
class Userdb {
    private $connectDb;
    private $password; 
    private $passwordConf;
    private $username;
    private $checkRegister;
    public function __construct(\model\ConnectDb $connectDb) {
        $this->connectDb = $connectDb;
        $this->checkRegister = false;
	}
    //SOURCE:  https://www.youtube.com/watch?v=bjT5PJn0Mu8
    public function getUserCredentials ($username, $passwordConf) {
        $this->username = $username;
        $this->passwordConf = $passwordConf;
    }
    public function setUpToDB () {
        $connect = $this->connectDb->createConnection();
        $mySql = "INSERT INTO users(name, password) VALUES (:name, :password)";
        $setUpUser = $connect->prepare($mySql);
        if($this->password == $this->passwordConf) {
            $setUpUser->bindParam(':name', $this->username);
            $setUpUser->bindParam(':password', $this->password);
            if($setUpUser->execute()) {
                $this->checkRegister = true;
            } else {
                $this->checkRegister = false;
            }
        }
    }
    public function checkUserReg () {
        return $this->checkRegister;
    }
    public function hashPassword($passwordReg) {
       $this->password = password_hash($passwordReg, PASSWORD_BCRYPT);
    }
}