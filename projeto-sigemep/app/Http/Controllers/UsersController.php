<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use Prettus\Validator\Contracts\ValidatorInterface;
//use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Entities\User;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Auth;
use Exception;

class UsersController extends Controller{
    
    protected $repository;
    protected $service;

    public function __construct(UserRepository $repository, UserService $service){
        $this->repository = $repository;
        $this->service = $service;
        //$this->validator  = $validator;
    }


    /**
     * FUNCAO:      login 
     * OBJETIVO:    Efetuar o login
     * ARGUMENTOS:  Os dados que contidos nos campos 'nome de usuario' e 'senha'
     * RETORNO:     Um ARRAY com os seguintes dados
     *                  'success' -> indica se houve falha ou sucesso no login
     *                  'message' -> mensagem explicando o motivo do erro/excecao
     */
    
    public function login(Request $dadosLogin){

        // recebendo dados inseridos pelo usuario
        $dadosAut = [
            'username' => $dadosLogin->get('username'),
            'password' => $dadosLogin->get('password')
        ];

        // Efetuando login
        try{
            // Se a criptografia de senha esta habilitada
            // é executado o metodo especifico
            if(env('SENHA_HASH')){
                Auth::attempt($dadosAut, false);
            }

            // A criptografia de senha nao esta habilitada
            else{
                $databaseData = DB::select('select * from users where username = ? or email = ?', [$dadosLogin->get('username'), $dadosLogin->get('username')]);
              
                /* Se o usuario nao existe,
                a operacao é sinalizada como false e é enviado mensagem para a view */
                if(!$databaseData){
                    //throw new Exception("Email/Login invalido");
                    $loginFeedback['success'] = false;
                    $loginFeedback['message'] = "O Email/Login nao existe";
                    echo json_encode($loginFeedback);
                    return;
                }

                /* Se o usuario existir, os dados do mesmo sao carregados */
                else{
                    $user = new User();
                    $user->loadDataLogin($databaseData[0]);

                    /* Se a senha informada for diferente da cadastrada é enviado
                    o alerta para a view*/
                    if($user->password != $dadosLogin->get('password')){
                        $loginFeedback['success'] = false;
                        $loginFeedback['message'] = "Senha invalida";
                        echo json_encode($loginFeedback);
                        return;
                    }
                }

                Auth::login($user);
            }
            //return redirect()->route('user.index');
            $loginFeedback['success'] = true;
            echo json_encode($loginFeedback);
            return;
        }

        /* Quando houver uma excecao, ela será mostrada na view */
        catch(Exception $e){
            $loginFeedback['success'] = false;
            $loginFeedback['message'] = $e->getMessage();
            echo json_encode($loginFeedback);
            return;
            //return $e->getMessage();
        }
    }
    

    /**
     * FUNCAO:      register
     * OBJETIVO:    acionar a view para cadastro de novo usuario
     * RETORNO:     view propriamente dita
     */
    public function register(){
       return view('user.register');
    }

    public function index(){
        return view('user.index');
        /*$this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('users.index', compact('users'));*/
    }

    /**
     * FUNCAO:      store
     * OBJETIVO:    Cadastrar o usuario
     * ARGUMENTOS:  Dados do usuario
     * RETORNO:     Dados necessarios para avaliar se houve falha ou nao no cadastro
     */
    public function store(UserCreateRequest $request)
    {
        //dd($request->all());
        $request = $this->service->store($request->all());

        // O usuario sendo cadastrado com sucesso, ou nao,
        // os dados referentes são enviados para a view
        if($request[0]['success']){
            echo json_encode($request);
            return;
            //--->$user = $request['data'];
        }
        else{
            echo json_encode($request);
            return;
            //--->$user = null;
        }

        /*return view('user.index',[
            'user' => $user,
//            'request' => $request
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
}
