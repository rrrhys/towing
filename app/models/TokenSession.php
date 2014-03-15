<?php

class TokenSession extends \Eloquent {
	protected $table = "sessions";
    protected $fillable = ['email'];
    protected $softDelete = true;

    public function user(){
    	return $this->belongsTo("User", 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }
}