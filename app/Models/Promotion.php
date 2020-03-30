<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Promotion extends BaseModel
{
    protected $table = 'promotions';

    protected $primaryKey = 'promotion_id';

    protected $keyType = 'int';

    protected $fillable = [
        'promotion_id',
        'promotion_type_id',
        'promotion_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
