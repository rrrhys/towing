<?php

class UserDetail extends \Eloquent {
	protected $hidden = ['user_id'];
	protected $fillable = ['company_trading_name','abn','contact_first_name','contact_surname','address_line_1','address_line_2','suburb','state','postcode','contact_number_1','contact_number_2','bank_account_name','bank_account_number','bank_account_bsb'];
public function user(){
	return $this->belongsTo('User');
}
}