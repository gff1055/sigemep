<?php

namespace App\Entities;

//use Illuminate\Database\Eloquent\Model;
//use Prettus\Repository\Contracts\Transformable;
//use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable //Model implements Transformable
{
    use SoftDeletes;
    use Notifiable;
    //use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['nome','usuario','senha','sexo','rua','bairro','num','compl','cep','estad','cidad','dataNasc','email','whatsapp','phone'];

    public function carregaDados($pDados){
        $this->nome = $pDados->nome;
        $this->usuario = $pDados->usuario;
        $this->senha = $pDados->senha;
        $this->sexo = $pDados->sexo;
        $this->rua = $pDados->rua;
        $this->bairro = $pDados->bairro;
        $this->num = $pDados->num;
        $this->compl = $pDados->compl;
        $this->cep = $pDados->cep;
        $this->estad = $pDados->estad;
        $this->cidad = $pDados->cidad;
        $this->dataNasc = $pDados->dataNasc;
        $this->email = $pDados->email;
        $this->whatsapp = $pDados->whatsapp;
        $this->phone = $pDados->phone;
    }


    public function setSenhaAttribute($pSenha){
        $this->attributes['senha'] = env('SENHA_HASH') ? bcrypt($pSenha) : $pSenha;
    }
}
