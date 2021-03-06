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
	protected $fillable = array('email','password','username');
    protected $softDelete = true;
    public static $rules = array(
    		'email'=>'required|email|unique:users',
    		'username'=>'required|alphadash|between:5,20|unique:users',
    		'password'=>'required|min:6|confirmed',
    		'password_confirmation'=>'required'
    	);


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
	public function getClickableEmailAttribute(){
		//returns a clickable link for this user.
		//easier to implement avatar etc later
		return "<a href='".URL::route('user.show',array($this->username))."'>" . $this->username . "</a>";
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
	public function jobs_bid_on(){
	/*	$jobs = array();
		$bids = $this->bids;
		foreach($bids as $bid){
			$job = $bid->job;
			if(!in_array($job,$jobs)){
				$jobs[] =$job;
			}
		}
		return $jobs;
	*/
	return $this->hasManyThrough('Bid','Job');
	}

	public function jobs_winning(){
		return $this->hasMany('Job','current_bid_owner_id','id')->orderBy('finishes_at','asc');
	}

	public function user_details(){
		
		return $this->hasOne('UserDetail');

		/*if(!$tower_detail){
			$tower_detail = new TowerDetail(['user_id'=>$this->id]);
		}
		return $tower_detail;*/
	}


	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

}