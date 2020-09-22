<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Patient;

/**
 * Class PatientTransformer.
 *
 * @package namespace App\Transformers;
 */
class PatientTransformer extends TransformerAbstract
{
    /**
     * Transform the Patient entity.
     *
     * @param \App\Entities\Patient $model
     *
     * @return array
     */
    public function transform(Patient $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
