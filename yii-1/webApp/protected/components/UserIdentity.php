<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $user='';
	private $pass='';

	function __construct($user, $pass){
		$this->user = $user;
		$this->pass = $pass;
	}

	public function getUser(){
		 return $this->user;
	}

	public function getPassword(){
		return $this->pass;
   }

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{ 
		$record = user::model()->findByAttributes(array('nombreUser'=>$this->getUser()));
		if ($record===null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}elseif ($record->userPassword !== $this->getPassword()) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}else{
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}