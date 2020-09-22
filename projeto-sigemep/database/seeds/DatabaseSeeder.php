<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'name' => 'Guilherme',
            'username' => 'gff105',
            'password' => env('SENHA_HASH')?bcrypt('souzag'):'souzag',
            'email' => 'gff105@gmail.com',
            'sexo' => 'Masculino',
            'phone' => '38991645549',
            'dataNasc' => '1987-10-05',

            /*'whatsapp' => '',
            'rua' => 'Joao Mendes Leal',
            'bairro' => 'Vila Ipiranga',
            'num' => '324',
            'compl' => '',
            'cep' => '39401665',
            'estad' => 'Minas Gerais',
            'cidad' => 'Montes Claros',*/
        ]);
    }
}
