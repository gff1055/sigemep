<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'phone' => 'required'
        ],
        
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
