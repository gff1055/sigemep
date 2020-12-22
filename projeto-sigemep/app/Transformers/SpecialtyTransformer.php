<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Specialty;

/**
 * Class SpecialtyTransformer.
 *
 * @package namespace App\Transformers;
 */
class SpecialtyTransformer extends TransformerAbstract
{
    /**
     * Transform the Specialty entity.
     *
     * @param \App\Entities\Specialty $model
     *
     * @return array
     */
    public function transform(Specialty $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
