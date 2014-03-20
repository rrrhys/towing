<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password');
	protected $fillable = array('email','password');
    protected $softDelete = true;

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
	public function tokens(){
		return $this->hasMany('TokenSession','user_id');
	}
	public function parent(){
		return $this->belongsTo('User','parent_id','id');
	}
	public function children(){
		return $this->hasMany('User','parent_id','id');
	}
	public function jobs(){
		if($this->is_corporate){
			return $this->hasMany('Job','top_user_id','id')->orderBy('finishes_at','asc');
		}
		else{
			return $this->hasMany('Job','user_id','id')->orderBy('finishes_at','asc');
		}
	}
	public function bids(){
		return $this->hasMany('Bid','user_id','id');
	}

	public function tower_details(){
		return $this->hasOne('TowerDetail');
		/*if(!$tower_detail){
			$tower_detail = new TowerDetail(['user_id'=>$this->id]);
		}
		return $tower_detail;*/
	}

}