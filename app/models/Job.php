<?php
use Carbon\Carbon;
class Job extends \Eloquent {
	protected $table = "jobs";
	protected $softDelete = true;
	protected $hidden = [];
    protected $fillable = ['job_type_id','job_number','vehicle_make','vehicle_model','pickup_postcode','dropoff_postcode','pickup_address_id','dropoff_address_id','started_at','finishes_at','pickup_at','dropoff_at'];
    protected $appends = array('finished','lowest_bid');

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
		return $this->hasMany('Bid','job_id','id')->orderBy('amount','asc');
	}
	public function getDates()
	{
	    return array('created_at','modified_at','deleted_at','pickup_at','dropoff_at','started_at','finishes_at');
	}
    public function getUtcAttribute(){
        return $this->finishes_at->toISO8601String();
    }
    public function getFinishedAttribute()
    {
        return $this->finishes_at < Carbon::now();
    }
    public function getLowestBidAttribute(){
        return $this->bids()->orderBy('amount','asc')->first();
    }

    public function addBid($amount, $user){
        if($this->finished){
            return false;
        }else
        {
            $bid = Bid::create(array('amount'=>$amount, 'user_id'=>$user->id, 'job_id'=>$this->id));
            
            $lowestCurrentBid = $this->bids()->orderBy('amount','asc')->first();
     
            if($bid->id != $lowestCurrentBid->id){
                //invalid, too high.
                $bid->delete();
            }


            $this->current_bid =$lowestCurrentBid->amount;
            $this->save();            
        }


    }

}