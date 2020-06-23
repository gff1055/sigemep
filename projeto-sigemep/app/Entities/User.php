<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['nome','usuario','senha','sexo','rua','bairro','num', 'compl', 'cep', 'estad', 'cidad', 'dataNasc', 'email','whatsapp','phone'];
    

}
