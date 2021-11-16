<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Specialty;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        /*User::create([
            'name' => 'Guilherme',
            'username' => 'gff',
            'password' => env('SENHA_HASH')?bcrypt('souzag'):'sou',
            'email' => 'gff@gmail.com',
            'sexo' => 'Masculino',
            'phone' => '99999999999',
            'dataNasc' => '1987-01-01',

            /*'whatsapp' => '',
            'rua' => 'Jo Men Le',
            'bairro' => 'Vila Ipir',
            'num' => '999',
            'compl' => '',
            'cep' => '39401665',
            'estad' => 'Minas Gerais',
            'cidad' => 'Montes Claros',*/
        /*]);*/

        Specialty::create([
            'name' => 'Oncologia',
        ]);

        Specialty::create([
            'name' => 'Clinica Medica',
        ]);

        Specialty::create([
            'name' => 'Dermatologia',
        ]);

    }
}
