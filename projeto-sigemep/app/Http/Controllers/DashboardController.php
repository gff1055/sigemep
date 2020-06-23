<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;

class DashboardController extends Controller{
    private $repositorio;
    private $validador;
    
    public function _construct(UserRepository $repositorio, UserValidator $validador){
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
            Auth::attempt($dadosAut, false);
            return redirect()->route('dashboard.index');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
