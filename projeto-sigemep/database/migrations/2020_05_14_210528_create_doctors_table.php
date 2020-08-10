<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDoctorsTable.
 */
class CreateDoctorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('login', 20)->unique();
			$table->string('password', 15)->unique();
			$table->string('numReg', 15);
			$table->string('photo', 200);
			$table->string('typePayment', 20);
			$table->text('describe');
			$table->unsignedInteger('formation');
			$table->unsignedInteger('specialty_id');

			$table->rememberToken();
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
		Schema::table('doctors', function(Blueprint $table) {

		});
		
		Schema::drop('doctors');
	}
}
