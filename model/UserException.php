<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name) {
    if(empty($name))
	{
		throw new \Exception("Username is missing");

	}	
    else if(empty($password))
    {
		throw new \Exception("Password is missing");
    } 
    }
    public function VlaidateRegisterUser($regPassword, $regName, $regPasswordConf) {
        if(empty($regName))
        {
            throw new \Exception("no username");
    
        }	
        else if(empty($regPassword))
        {
            throw new \Exception("no password");
        }
        else if($regPassword != $regPasswordConf) 
        {
            throw new \Exception("Passwords do not match.");
        }
        else if(strlen($regPassword) <= 6) {
            throw new \Exception("Password has too few characters, at least 6 characters.");
        }
    }
}