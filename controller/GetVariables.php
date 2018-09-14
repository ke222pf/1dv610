<?php
class GetVariables {
public function __construct($username, $password, $message)
{
    $this->message = $message;
    $this->username = $username;
    $this->password = $password;
    try {
        $this->ValidateUserCredentials();
      }
      catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
    // var_dump("this is from controller", $this->username, $this->password);
}
private function ValidateUserCredentials() {
if(empty($this->username))
{
    throw new Exception($this->message);
}
    else if(empty($this->password))
    {
        throw new Exception($this->message);
    
    } 
        else
    {
        var_dump($this->username, $this->password);
    }
}

}