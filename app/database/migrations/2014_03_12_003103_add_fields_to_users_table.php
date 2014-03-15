<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table) {
			$table->integer('parent_id')->default(0);
			$table->boolean('is_corporate')->default(0);
			$table->boolean('is_admin')->default(0);
			$table->boolean('is_tower')->default(0);
			$table->boolean('is_lister')->default(0);
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
	    Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('parent_id');
			$table->dropColumn('is_corporate');
			$table->dropColumn('is_admin');
			$table->dropColumn('is_tower');
			$table->dropColumn('is_lister');
        });
	}

}
