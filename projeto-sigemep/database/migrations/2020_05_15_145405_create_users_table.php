<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{ 
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			
			$table->string("name", 50);
			$table->string("login", 12)->unique();
			$table->string("password", 18);
			$table->string("sexo", 18);
			$table->string("rua", 18);
			$table->string("bairro", 18);
			$table->string("num", 6);
			$table->string("compl", 18)->nullable();
			$table->string("cep", 8);
			$table->string("estad", 3);
			$table->string("cidad", 18);
			$table->date("dataNasc")->nullable();
			
			$table->string("email", 50)->unique();
			$table->string("whatsapp", 18)->nullable();
			$table->string("phone", 18)->nullable();
						
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
		Schema::create('users', function(Blueprint $table) {
			
		});

		Schema::drop('users');
	}
}
