<?php

class Bid extends \Eloquent {
	protected $table = "bids";
	protected $softDelete = true;
	protected $hidden = [];
    protected $fillable = ['amount','user_id','job_id'];

    public function job(){
    	return $this->belongsTo('Job','job_id','id');
    }
    public function owner(){
    	return $this->belongsTo('User','user_id','id');
    }
}