<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    public $timestamps = false;

    protected $fillable = ['email', 'password', 'role'];
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
    public static $change_password_rules  = [
        'OldPassword' => 'required',
        'NewPassword' => 'required|min:4',
        'NewPassword2' => 'required|same:NewPassword'
    ];

    public static $messages = [
        'OldPassword.required' => 'Neįvestas senasis slaptažodis',
        'NewPassword.required' => 'Neįvestas naujas slaptažodis',
        'NewPassword2.required' => 'Nepakartotas naujas slaptažodis',
        'same' => 'Nesutampa naujai įvesti slaptažodžiai',
        'min' => 'Nemažiau 4 simbolių'
    ];

	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}