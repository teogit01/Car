<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class BookCar extends BaseModel
{
    protected $table = 'book_cars';

    protected $primaryKey = 'book_car_id';

    protected $keyType = 'int';

    protected $fillable = [
        'book_car_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
