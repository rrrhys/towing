<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('bids', function(Blueprint $table) {
            $table->increments('id');
			$table->decimal('amount');
			$table->integer('user_id');
			$table->integer('job_id');
			$table->boolean('is_winning');
			$table->timestamps();
			$table->softDeletes();
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('bids');
	}

}
