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
			$table->string("username", 18)->unique();
			$table->string("password", 254);
			$table->string("email", 50)->unique();
			$table->string("sexo", 18);
			$table->string("phone", 18)->nullable();
			$table->date("dataNasc")->nullable();
			
/*			$table->string("rua", 18);
			$table->string("bairro", 18);
			$table->string("num", 6);
			$table->string("compl", 18)->nullable();
			$table->string("cep", 8);
			$table->string("estad", 25);
			$table->string("cidad", 18);
			
*/
		
					
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
		Schema::table('users', function(Blueprint $table) {
			
		});

		Schema::drop('users');
	}
}
