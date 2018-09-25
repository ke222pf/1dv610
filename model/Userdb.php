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
    public function getUserCredentials ($username, $passwordConf, $password) {
        $this->username = $username;
        $this->passwordConf = $passwordConf;
        $this->password = $password;
    }
    public function setUpToDB () {
        $connect = $this->connectDb->createConnection();
        $mySql = "INSERT INTO users(name, password) VALUES (:name, :password)";
        $setUpUser = $connect->prepare($mySql);
        if($this->password == $this->passwordConf && strlen($this->username) > 2 && strlen($this->password > 5)) {
            $hash = password_hash($this->password, PASSWORD_BCRYPT);
            $setUpUser->bindParam(':name', $this->username);
            $setUpUser->bindParam(':password', $hash);
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
}