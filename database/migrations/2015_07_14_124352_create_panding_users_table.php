<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePandingUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('panding_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->char('token',40);
			$table->integer('tstamp');
			$table->integer('phone');
			$table->integer('code');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('panding_users');
	}

}
