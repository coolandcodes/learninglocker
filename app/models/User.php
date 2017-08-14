<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
# use Jenssegers\Mongodb\Model as Eloquent; - SynEIS won't be using mongodb for User model for now, only mysql on SynAccounts.

class User extends Eloquent implements UserInterface, RemindableInterface {

  protected $guarded = ['_id'];
  protected $connection = 'mysql';
  # protected $collection = 'users';
  protected $table = 'syn_tbl_users';
  protected $hidden = ['password'];
  protected $fillable = ['email'];
  protected $rules = [
    'email'    => 'required|email|unique:users',
    'name'     => 'required',
    'password' => 'required|confirmed'
  ];

  public function validate( $data ) {
    return Validator::make($data, $this->rules);
  }

  public function getAuthIdentifier() { return $this->getKey(); }
  public function getAuthPassword() { return $this->password; }
  public function getReminderEmail() { return $this->email; }
  public function getRememberToken() { return $this->remember_token; }
  public function setRememberToken($value) { $this->remember_token = $value; }
  public function getRememberTokenName() { return 'remember_token'; }
}
