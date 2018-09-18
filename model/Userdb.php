<?php
namespace model;
// require_once('model/ConnectDb.php');
class Userdb {
    private $connectDb;
    private $password; 
    private $username;
    public function __construct(\model\ConnectDb $connectDb) {
        $this->connectDb = $connectDb;
	}
    //SOURCE:  https://www.youtube.com/watch?v=bjT5PJn0Mu8
    public function getUserCredentials ($username) {
        $this->username = $username;
    }
    public function setUpToDB () {
        $connect = $this->connectDb->createConnection();
        $mySql = "INSERT INTO users(name, password) VALUES (:name, :password)";
        $setUpUser = $connect->prepare($mySql);
        $setUpUser->bindParam(':name', $this->username);
        $setUpUser->bindParam(':password', $this->password);
        $setUpUser->execute();
    }
    public function hashPassword($passwordReg) {
       $this->password = password_hash($passwordReg, PASSWORD_BCRYPT);
    }
}