<?php
namespace view;
use Exception;
class RegisterView {
    private static $registerMessageId = 'RegisterView::Message';
	private static $registerName = 'RegisterView::UserName';
	private static $registerPassword = 'RegisterView::Password';
    private static $registerPasswordRepeat = 'RegisterView::PasswordRepeat';
    private static $registerUser = 'DoRegistration';
    private $userException;
	public function __construct(\model\UserException $userException) {
		$this->userException = $userException;
	}
    public function response() {
        $message = '';
        if(!empty($_POST[self::$registerUser])) {
        try
			{
				// $this->ValidateUserCredentials();
				$this->userException->ValidateUserCredentials($this->getRequestPassword(), $this->getRequestUserName());
			}
			catch(Exception $e)
			{
				$message = "Message: " . $e->getMessage();
			}
        }
        $response = $this->generateRegisterFormHTML($message);
        return $response;
    }

    private function generateRegisterFormHTML ($Regmessage) {
		return '
		<form method="POST" enctype="multipart/form-data">
        <fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$registerMessageId . '">' . $Regmessage . '</p>
					
					<label for="' . self::$registerName . '">Username :</label>
					<input type="text" id="' . self::$registerName . '" name="' . self::$registerName . '" value="" />

					<label for="' . self::$registerPassword . '">Password :</label>
					<input type="password" id="' . self::$registerPassword . '" name="' . self::$registerPassword . '" />

					<label for="' . self::$registerPasswordRepeat . '">Repeat password  :</label>
					<input type="password" id="' . self::$registerPasswordRepeat . '" name="' . self::$registerPasswordRepeat . '" />
					
					<input type="submit" name="DoRegistration" value="register" />
				</fieldset>
        </form>
		';
    }
    
	public function getRequestUserName() {
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
	public function getRequestPassword() {
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
}