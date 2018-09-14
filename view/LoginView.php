<?php
require_once('controller/GetVariables.php');
class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	// require_once('./model/LoginModel.php');
	
	
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		$message = '';
		$response = $this->generateLoginFormHTML($message);
		if(!empty($_POST[self::$login]))
		{
			// $this->getRequestUserName();
			// $this->getRequestPassword();
			$gv = new GetVariables($this->getRequestUserName(), $this->getRequestPassword(), $this->getRequestMessage());
		}
		else
		{
			$error = 'Please enter a user name';
			echo $error;
		}
			//$response .= $this->generateLogoutButtonHTML($message);
			
			return $response;
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
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />

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
	private function getRequestUserName() {
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
	private function getRequestPassword() {
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
	private function getRequestMessage()
	{
		
		if(isset($_POST[$message]))
		{
			echo $_POST[$message];
			return $_POST[$message];
		}
	}
}