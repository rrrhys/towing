<?php

class TokenSession extends \Eloquent {
	protected $table = "sessions";
    protected $fillable = ['email'];
}