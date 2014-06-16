<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_data', function($table) {
			$table->increments('id');
			$table->integer('company_id');
			$table->string('address', 100);
			$table->string('phone', 50);
			$table->string('skype', 50);
			$table->float('latitude');
			$table->float('longitude');
			$table->string('logo_url', 100);
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
		Schema::drop('company_data');
	}

}
