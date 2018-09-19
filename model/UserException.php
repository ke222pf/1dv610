<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name, $matchUser) {
    if(empty($name))
	{
		throw new \Exception("Username is missing");

    }
    else if(empty($password))
    {
		throw new \Exception("Password is missing");
    } 
    else if($matchUser = false) {

        throw new \Exception("Wrong name or password");

    } else if($matchUser = true) {
        
        throw new \Exception("Welcome");
    }
    }

    public function VlaidateRegisterUser($regPassword, $regName, $regPasswordConf, $checkUserReg) {
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
        else if(strlen($regPassword) < 6) {
            throw new \Exception("Password has too few characters, at least 6 characters.");
        }
        else if(strlen($regName) < 3) {
            throw new \Exception("Username has too few characters, at least 3 characters.");
        }
        else if($checkUserReg = true) {
            throw new \Exception("Registered new user.");
        }
    }
}