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
            'nome' => 'Guilherme',
            'usuario' => 'gff105',
            'senha' => env('SENHA_HASH')?bcrypt('souzag'):'souzag',
            'sexo' => 'Masculino',
            'rua' => 'Joao Mendes Leal',
            'bairro' => 'Vila Ipiranga',
            'num' => '324',
            'compl' => '',
            'cep' => '39401665',
            'estad' => 'Minas Gerais',
            'cidad' => 'Montes Claros',
            'dataNasc' => '1987-10-05',
            'email' => 'gff105@gmail.com',
            'whatsapp' => '',
            'phone' => '38991645549'
        ]);
    }
}
