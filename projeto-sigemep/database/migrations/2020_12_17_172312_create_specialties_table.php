<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSpecialtiesTable.
 */
class CreateSpecialtiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialties', function(Blueprint $table) {
			$table->increments('id');
			
			$table->string("name", 50);
			
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
	public function down(){

		Schema::table('specialties', function(Blueprint $table) {
		});

		Schema::drop('specialties');
	}
}
