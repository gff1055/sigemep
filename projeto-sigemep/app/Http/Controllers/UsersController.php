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
                // variavel que recebe os dados vindos do banco
                $databaseData = DB::select('select * from users where username = ? or email = ?', [$dadosLogin->get('username'), $dadosLogin->get('username')]);
              
                // Se o usuario nao existe
                if(!$databaseData){
                    //throw new Exception("Email/Login invalido");
                    $loginFeedback['success'] = false;
                    $loginFeedback['message'] = "O Email/Login nao existe";
                    echo json_encode($loginFeedback);
                    return;
                }

                // Usuario existe
                else{
                    $user = new User();
                    $user->loadDataLogin($databaseData[0]);

                    // A senha do usuario esta correta?
                    if($user->password != $dadosLogin->get('password')){
                        //throw new Exception("Senha invalida");
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

        catch(Exception $e){
            $loginFeedback['success'] = false;
            $loginFeedback['message'] = $e->getMessage();
            echo json_encode($loginFeedback);
            return;
            //return $e->getMessage();
        }
    }
    
    public function register(){
       return view('user.register');
    }

    public function index(){
        echo ("EEEEEEEBBBAAA");
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
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        //dd($request->all());
        $request = $this->service->store($request->all());

        // Se o usuario for cadsatrado com sucesso, uma mensagem de "sucesso" é enviada para a view
        if($request['success']){
            echo json_encode($request);
            return;
            //--->$user = $request['data'];
        }

        // Caso contrario, uma mensagem de "falha" é enviada
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
