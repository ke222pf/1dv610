<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name) {
    if(empty($name))
	{
		throw new \Exception("no username");

	}	
    else if(empty($password))
    {
		throw new \Exception("no password");
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
        else if($regPassword != $regPasswordConf) {
            throw new \Exception("Password must match with repeat password!");
        }
    }
}