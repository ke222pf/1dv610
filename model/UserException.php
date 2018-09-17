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
}