<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('companies', function($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 50);
			$table->string('password', 50);
			$table->string('country', 30);
			$table->text('description');
			$table->string('remember_token', 100);
			$table->timestamps();
			$table->string('registration_status');

		});
		

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
