<?php
namespace view;
use Exception;
class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $userException;
	private $loginUser;
	private $message;
	public function __construct(\model\UserException $userException, \model\Login $loginUser) {
		$this->userException = $userException;
		$this->loginUser = $loginUser;
	}
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		$this->message = '';
		if(!empty($_REQUEST[self::$logout])) {
			$this->logout();
			return true;
		}

	}
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	public function renderlogginForm () {
	if($this->loginUser->userLoggedIn() == true) {
			$_SESSION['username'] = $this->getRequestUserName();
			$response = $this->generateLogoutButtonHTML($this->message);
			return $response;
		} else {
			$response = $this->generateLoginFormHTML($this->message);
			return $response;
		}
	}
	public function logout() {
		unset($_SESSION['username']);
		session_destroy();
		if(!isset($_SESSION['username'])) {

			$this->message = "Bye bye!";
		}
			$response = $this->generateLoginFormHTML($this->message);
			return $response;
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'. $this->keepUsername() .'" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	public function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
		$username = self::$name;
		if(isset($_POST[$username]))
		{
			return $_POST[$username];
		}
		else
		{
			return "";
		}
	}
	public function validateLogin () {
		if(!empty($_POST[self::$login]))
		{
			try
			{
				$this->userException->ValidateUserCredentials($this->getRequestPassword(), $this->getRequestUserName(), $this->loginUser->userLoggedIn(), $this->ifLoggedIn());
				
			}
			catch(Exception $e)
			{
				$this->message = $e->getMessage();
				
			}
		}
	}
	public function getRequestPassword() {
		$password = self::$password;
		if(isset($_POST[$password]))
		{
			return $_POST[$password];
		}
		else
		{
			return "";
		}
	}
	public function keepUsername() {
		return $this->getRequestUserName();
	}
	public function ifLoggedIn () {
		return isset($_SESSION['username']) && strlen($_SESSION['username']) > 0;
	}

}