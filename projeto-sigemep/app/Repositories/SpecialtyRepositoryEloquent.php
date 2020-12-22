<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SpecialtyRepository;
use App\Entities\Specialty;
use App\Validators\SpecialtyValidator;

/**
 * Class SpecialtyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SpecialtyRepositoryEloquent extends BaseRepository implements SpecialtyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Specialty::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SpecialtyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
