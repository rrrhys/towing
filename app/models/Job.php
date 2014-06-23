<?php
use Carbon\Carbon;
class Job extends \Eloquent {

    
	protected $table = "jobs";
	protected $softDelete = true;
	protected $hidden = [];
    protected $fillable = ['user_id','job_type_id','job_number','vehicle_make','vehicle_model','pickup_postcode','dropoff_postcode','pickup_address_1','pickup_address_2','dropoff_address_1','dropoff_address_2','started_at','finishes_at','pickup_at','dropoff_at'];
    protected $appends = array('finished','lowest_bid');

    public function scopeRunning($query){

        return $query->where('finishes_at','>',Carbon::now()->toDateTimeString());
    }

    public function scopeFinished($query){

        return $query->where('finishes_at','<',Carbon::now()->toDateTimeString());
    }

    public function scopeNotawarded($query){

        return $query->where('awarded_at',null);
    }

    public function scopeAwarded($query){

        return $query->whereRaw('awarded_at is not null');
    }

    public function scopeHasbids($query){

        return $query->whereRaw('current_bid is not null');
    }

    public function scopeHasnobids($query){

        return $query->whereRaw('current_bid is null');
    }
    public function scopeNotnotified($query){

        return $query->where('finished_notification_sent_at','=',null);
    }


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
    public function getAwardedAttribute()
    {
        return $this->awarded_at != null;
    }
    public function getLowestBidAttribute(){
        return $this->bids()->orderBy('amount','asc')->first();
    }
    public function getDistanceApproxAttribute(){
        return "XX";
    }
    public function AwardToLowestBidder(){
        $this->awarded_at = Carbon::now();
        $this->awarded_to = $this->lowest_bid->owner->id;
        $this->save();

        //fire off an email about it. 
        Log::info("user info is " . $this->owner->user_details()->get());
        Queue::push('SendEmail',array(
            'poster_id'=>$this->owner->id,
            'recipient_id'=>$this->lowest_bid->owner->id,
            'job_id'=>$this->id,
            'email'=>'emails.YouWonAJob'));
    }
    public function addBid($amount, $user){
        $return_value = array('result'=>'false','messages' => array());
        if($this->finished){
            $return_value['messages'][] = "The listing has already finished.";
        }
        else
        {
            $bid = Bid::create(array('amount'=>$amount, 'user_id'=>$user->id, 'job_id'=>$this->id));
            
            $lowestCurrentBid = $this->bids()->orderBy('amount','asc')->first();
     
            if($bid->id != $lowestCurrentBid->id){
                //invalid, too high.
                $bid->delete();
                $return_value['messages'][] = "The bid was too high.";
            }
            else{
                $this->current_bid =$lowestCurrentBid->amount;
                $this->current_bid_owner_id = $lowestCurrentBid->owner->id;
                $this->save(); 
                $return_value['messages'][] = "The bid was saved. You are the current highest bidder.";     
                $return_value['result'] = true;                 
            }



        }
        return $return_value;


    }

    public function getTimeRemainingAttribute(){

        if($this->finishes_at < Carbon::now()){
            return "Finished";
        }
        $diff = $this->finishes_at->diff(Carbon::now());

        $outString = "";
        if($diff->d > 0){
            $outString .= "{$diff->d}d {$diff->h}h";
        }
        else
        {
            $outString .= "{$diff->h}h {$diff->i}m";
        }
        $outString .= " (" . $this->finishes_at->addHours(10)->format('l g.ia'). ")";
        return $outString;
    }


}
