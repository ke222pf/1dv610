<?php
namespace model;
class UserException {

public function ValidateUserCredentials ($password, $name, $matchUser, $ifLoggedIn) {

    if(empty($name))
	{
		throw new \Exception("Username is missing");

    }
    if(empty($password))
    {
		throw new \Exception("Password is missing");
    } 
    if($matchUser == true && $ifLoggedIn == false) {

        throw new \Exception("Welcome");

    }
    if ($matchUser == true && $ifLoggedIn == true) {
        throw new \Exception("");

    }
    if($matchUser == false) {
        
        throw new \Exception("Wrong name or password");
    }
}
}
