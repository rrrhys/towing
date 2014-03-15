<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('jobs', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('top_user_id')->default(0);
			$table->integer('job_type_id');
			$table->string('job_number');
			$table->string('vehicle_make');
			$table->string('vehicle_model');
			$table->integer('pickup_postcode');
			$table->integer('dropoff_postcode');
			$table->integer('pickup_address_id');
			$table->integer('dropoff_address_id');
			$table->timestamp('started_at');
			$table->timestamp('finishes_at');
			$table->timestamp('pickup_at');
			$table->timestamp('dropoff_at');
			$table->decimal('current_bid');
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
	    Schema::drop('jobs');
	}

}
