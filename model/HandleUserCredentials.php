<?php
namespace model;
class HandleUserCredentials {
    public function HashPassword($password) {
        echo password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        // TODO: compare the hased password from the database with the users.
        // if(password_verify($password)){

        // } else {

        // }
    }
}