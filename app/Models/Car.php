<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Car extends BaseModel
{
    protected $table = 'cars';

    protected $primaryKey = 'car_id';

    protected $keyType = 'int';

    protected $fillable = [
        'car_id',
        'user_id',
        'car_models_id',
        'car_name',
        'image',
        'rental_costs',
        'status',
        'car_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
