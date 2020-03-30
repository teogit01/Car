<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class CarModel extends BaseModel
{
    protected $table = 'car_models';

    protected $primaryKey = 'car_models_id';

    protected $keyType = 'int';

    protected $fillable = [
        'car_models_id',
        'car_model_name',
        'seating',
        'model',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
