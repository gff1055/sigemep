<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SpecialtyCreateRequest;
use App\Http\Requests\SpecialtyUpdateRequest;
use App\Repositories\SpecialtyRepository;
use App\Validators\SpecialtyValidator;

/**
 * Class SpecialtiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SpecialtiesController extends Controller
{
    /**
     * @var SpecialtyRepository
     */
    protected $repository;

    /**
     * @var SpecialtyValidator
     */
    protected $validator;

    /**
     * SpecialtiesController constructor.
     *
     * @param SpecialtyRepository $repository
     * @param SpecialtyValidator $validator
     */
    public function __construct(SpecialtyRepository $repository, SpecialtyValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $specialties = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $specialties,
            ]);
        }

        return view('specialties.index', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SpecialtyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SpecialtyCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $specialty = $this->repository->create($request->all());

            $response = [
                'message' => 'Specialty created.',
                'data'    => $specialty->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specialty = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $specialty,
            ]);
        }

        return view('specialties.show', compact('specialty'));
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
        $specialty = $this->repository->find($id);

        return view('specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SpecialtyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SpecialtyUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $specialty = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Specialty updated.',
                'data'    => $specialty->toArray(),
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
                'message' => 'Specialty deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Specialty deleted.');
    }
}
