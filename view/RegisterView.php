<?php
namespace view;
class RegisterView {
    private static $registerMessageId = 'RegisterView::Message';
	private static $registerName = 'RegisterView::UserName';
	private static $registerPassword = 'RegisterView::Password';
    private static $registerPasswordRepeat = 'RegisterView::PasswordRepeat';
    private static $registerUser = 'RegisterView::DoRegistration';
    private $userException;
    private $userdb;
    private $message;
	public function __construct(\model\UserException $userException, \model\Userdb $userdb) {
        $this->userException = $userException;
        $this->userdb = $userdb;
	}

    private function generateRegisterFormHTML ($Regmessage) {
		return '
		<form method="post">
        <fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$registerMessageId . '">' . $Regmessage . '</p>
					
					<label for="' . self::$registerName . '">Username :</label>
					<input type="text" size="20"  name="' . self::$registerName . '" value="'. $this->getRequestRegUserName() .'" id="' . self::$registerName . '" />

					<label for="' . self::$registerPassword . '">Password :</label>
					<input type="password" size="20"  name="' . self::$registerPassword . '" id="' . self::$registerPassword . '" />

					<label for="' . self::$registerPasswordRepeat . '">Repeat password  :</label>
					<input type="password" size="20" name="' . self::$registerPasswordRepeat . '" id="' . self::$registerPasswordRepeat . '" />
					
					<input type="submit" id="submit" name="'. self::$registerUser .'" value="register" />
				</fieldset>
        </form>
		';
    }
    // public function generateView () {
    //     $this->message = "";
    //     $response = $this->generateRegisterFormHTML($this->message);
    //     return $response;
    // }
    public function validateUserReg() {
        if(!empty($_POST)) {
            $this->validateUserRegristration();
            $response = $this->generateRegisterFormHTML($this->message);
            return $response;
        } else {
            $response = $this->generateRegisterFormHTML($this->message);
            return $response;
        }
    }

	public function getRequestRegUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
		$username = self::$registerName;
		if(isset($_POST[$username]))
		{
			return $_POST[$username];
		}
		else
		{
			return "";
		}
	}
	public function getRequestRegPassword() {
		$password = self::$registerPassword;
		if(isset($_POST[$password]))
		{
			return $_POST[$password];
		}
		else
		{
			return "";
		}
    }
    public function getRequestRegPasswordConformation() {
		$passwordConf = self::$registerPasswordRepeat;
		if(isset($_POST[$passwordConf]))
		{
			return $_POST[$passwordConf];
		}
		else
		{
			return "";
		}
    }
    public function validateUserRegristration() {
        $this->message = "";
        if($this->getRequestRegPassword() != $this->getRequestRegPasswordConformation()) 
        {
            $this->message .= "Passwords do not match." .  '<br>';
        }
        if(empty($this->getRequestRegUserName()) || strlen($this->getRequestRegUserName() < 3))
        {
            $this->message .= "Username has too few characters, at least 3 characters." . '<br>';
    
        }
        if(strlen($this->getRequestRegPasswordConformation()) < 6) {
            $this->message .= "Password has too few characters, at least 6 characters.". '<br>';
        }
        if($this->userdb->checkUserReg() == true) {
            $this->message .= "Registered new user.". '<br>';
        }
    }
}