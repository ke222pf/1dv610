<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name, $matchUser, $ifLoggedIn) {
    if(empty($name))
	{
		throw new \Exception("Username is missing");

    }
    else if(empty($password))
    {
		throw new \Exception("Password is missing");
    } 
    else if($matchUser == true && $ifLoggedIn == false) {

        throw new \Exception("Welcome");

    } else if ($matchUser == true && $ifLoggedIn == true) {
        throw new \Exception("");

    } else if($matchUser == false) {
        
        throw new \Exception("Wrong name or password");
    }
}

    public function VlaidateRegisterUser($regPassword, $regName, $regPasswordConf, $checkUserReg) {
        if(empty($regName))
        {
            $message = "Username has too few characters, at least 3 characters.";
    
        }	
        else if(empty($regPassword))
        {
            $message = "Password has too few characters, at least 6 characters.";
        }
        else if($regPassword != $regPasswordConf) 
        {
            $message = "Passwords do not match.";
        }
        else if(strlen($regPassword) < 6) {
            $message = "Password has too few characters, at least 6 characters.";
        }
        else if(strlen($regName) < 3) {
            $message = "Username has too few characters, at least 3 characters.";
        }
        else if($checkUserReg = true) {
            $message = "Registered new user.";
        }
    }
}