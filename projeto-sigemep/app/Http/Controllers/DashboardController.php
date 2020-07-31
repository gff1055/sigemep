<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Entities\User;
use Auth;
use Exception;

class DashboardController extends Controller{
    private $repositorio;
    private $validador;
    
    public function __construct(UserRepository $repositorio, UserValidator $validador){
        $this->repositorio = $repositorio;
        $this->validador = $validador;
    }

    public function index(){
        echo ("EEEEEEEBBBAAA");
    }


    public function login(Request $dadosLogin){
        
        $dadosAut = [
            'usuario' => $dadosLogin->get('usuario'),
            'senha' => $dadosLogin->get('senha')
        ];

        try{

            if(env('SENHA_HASH')){
                Auth::attempt($dadosAut, false);
            }

            else{
                $usuario = new User();
                $usuario->carregaDados(DB::select('select * from users where usuario = ? or email = ?', [$dadosLogin->get('usuario'), $dadosLogin->get('usuario')])[0]);
                
                //dd($usuario);
                
                /** POSSIVEL SOLUCAO: FUNCAO PARA CARREGAR OS DADOS DENTRO DA CLASSE USER*/

                //dd(get_class($usuario));
                /*$usuario = $this->repositorio->findWhere([
                    'usuario' => $dadosLogin->get('usuario'),
                ])->first();*/

                //$email = $this->repositorio->findWhere()->first();
                /*$t = get_class($usuario);
                dd($t);*/
            
                if(!$usuario)
                    throw new Exception("Email/Login invalido");
                if($usuario->senha != $dadosLogin->get('senha'))
                    throw new Exception("Senha invalida");
                
                

                Auth::login($usuario);
            }
            
            return redirect()->route('dashboard.index');
        }
        
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
