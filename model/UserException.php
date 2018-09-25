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
}
