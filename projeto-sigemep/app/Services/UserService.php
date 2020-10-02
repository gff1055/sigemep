<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserService{
	private $repository;
	private $validator;

	public function __construct(UserRepository $paramRepos, UserValidator $paramValid){
		$this->repository = $paramRepos;
		$this->validator = $paramValid;
	}

	public function store($data){
		try{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$user = $this->repository->create($data);

			return[
				'success' => 'true',
				'message' => 'Usuario Cadastrado',
				'data' => $user
			];
		}
		catch(Exception $except){
			return[
				'success' => 'false',
				'message' => 'Erro interno',
				'data' => null
			];
		}
	}

	public function update(){

	}

	public function delete(){

	}

}


?>