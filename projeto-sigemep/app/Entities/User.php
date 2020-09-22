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
    protected $fillable = ['name','username','password','email','sexo','dataNasc','phone'];
    

    public function loadDataLogin($pDados){
        $this->name = $pDados->name;
        $this->username = $pDados->username;
        $this->password = $pDados->password;
        $this->email = $pDados->email;
    }


    public function setSenhaAttribute($pSenha){
        $this->attributes['senha'] = env('SENHA_HASH') ? bcrypt($pSenha) : $pSenha;
    }

    /*
		nome - 		input text
		login - 	--
		password - 	password
		email -		input text
		sexo -		combobox
		*rua -		input text
		*bairro -	--
		*num -		--
		*compl - 	--
		*estad -		--
		*cidad -		--
		*dataNasc -	--
		whatsapp -	--
        phone -		--
    */
}
