<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostcodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postcodes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('postcode', 4);
			$table->string('suburb', 100);
			$table->string('state', 15);
			$table->string('dc', 30);
			$table->string('type', 30);
			$table->decimal('lat', 10,8);
			$table->decimal('lon', 11,8);
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
		Schema::drop('postcodes');
	}

}
