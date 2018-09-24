<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name, $matchUser, $ifLoggedIn) {
    // var_dump($ifLoggedIn, $matchUser);
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

    // public function VlaidateRegisterUser($regPassword, $regName, $regPasswordConf, $checkUserReg) {
    //     // if(empty($regName))
    //     // {
    //     //     throw new \Exception("Username has too few characters, at least 3 characters.");
    
    //     // }	
    //     // if($regPassword != $regPasswordConf) 
    //     // {
    //     //     throw new \Exception("Passwords do not match.");
    //     // }
    //     if(strlen($regPassword) < 6) {
    //         throw new \Exception("Password has too few characters, at least 6 characters.");
    //     }
    //     if(strlen($regName) < 3) {
    //         throw new \Exception("Username has too few characters, at least 3 characters.");
    //     }
    //     if($checkUserReg == true) {
    //         throw new \Exception("Registered new user.");
    //     }
    // }
}
