<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_details', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('company_trading_name');
			$table->string('abn');
			$table->string('contact_first_name');
			$table->string('contact_surname');
			$table->string('address_line_1');
			$table->string('address_line_2');
			$table->string('suburb');
			$table->string('state');
			$table->string('postcode');
			$table->string('contact_number_1');
			$table->string('contact_number_2');
			$table->string('bank_account_name')->default('');
			$table->string('bank_account_number')->default('');
			$table->string('bank_account_bsb')->default('');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_details');
	}

}
