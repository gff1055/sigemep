<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePatientsTable.
 */
class CreatePatientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			
			$table->string("sexo", 18);
			$table->string("rua", 18);
			$table->string("bairro", 18);
			$table->string("num", 6);
			$table->string("compl", 18)->nullable();
			$table->string("cep", 8);
			$table->string("estad", 25);
			$table->string("cidad", 18);
			$table->date("dataNasc")->nullable();
			
			
			$table->string("whatsapp", 18)->nullable();
			$table->string("phone", 18)->nullable();

			$table->timestamps();
			$table->rememberToken();
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
		Schema::drop('patients');
	}
}
