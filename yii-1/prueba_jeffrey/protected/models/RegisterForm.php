<?php

class RegisterForm extends CFormModel{
    public $name;
    public $lastname;
    public $email;
    public $password;

    public function rules()
	{
		return array(
			// name, email, subject and body are required
            array('name, lastname, email', 'required',
            "message"=>"Este campo es obligatorio"),
			// email has to be a valid email address
            array('email', 'email',
            "message"=>"El email es incorrecto")
		);
	}
}

 
