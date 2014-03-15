<?php
use Carbon\Carbon;
class Job extends \Eloquent {
	protected $table = "jobs";
	protected $softDelete = true;
	protected $hidden = [];
    protected $fillable = [];
    protected $appends = array('finished');

    public function job_type(){
    	return $this->hasOne('JobType','job_type_id');
    }
    public function owner(){
    	return $this->hasOne('User','id','user_id');
    }
    public function corp_owner(){
    	return $this->hasOne('User','top_user_id','id');
    }
 	public function bids(){
		return $this->hasMany('Bid','job_id','id');
	}

	public function getDates()
	{
	    return array('created_at','modified_at','deleted_at','pickup_at','dropoff_at','started_at','finishes_at');
	}

    public function getFinishedAttribute()
    {
        return $this->finishes_at < Carbon::now();
    }

}