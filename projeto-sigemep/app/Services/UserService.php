<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

use Illuminate\Support\Facades\DB;

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
			$userExist = DB::select('select * from users where username = ?', [$data['username']]);
			
			// Existe um usuario cadastrado com as informaçoes fornecidas...
			if($userExist){

				// Retorna mensagem ao controller
				return[
					'success' => 'false',
					'message' => 'Já exite uma conta com esse nome de usuario',
					'data' => null
				];

			}

			$emailExist = DB::select('select * from users where email = ?', [$data['email']]);

			// Existe um email ja cadastrado no banco de dados...
			if($emailExist){

				// Retorna mensagem ao controller
				return[
					'success' => 'false',
					'message' => 'Já exite uma conta associada com esse email',
					'data' => null
				];

			}

			// Não existe nenhum usuario cadastrado...
			if(!$userExist && !$emailExist){
				$user = $this->repository->create($data); //SQLSTATE[23000]: Integrity constraint violation:

				// Retorna mensagem ao controller
				return[
					'success' => 'true',
					'message' => 'Usuario Cadastrado',
					'data' => $user
				];

			}
		}

		catch(Exception $except){

			// Retorna mensagem ao controller
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