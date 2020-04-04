<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class PromontionType extends BaseModel
{
    protected $table = 'promotion_types';

    protected $primaryKey = 'promotion_type_id';

    protected $keyType = 'int';

    protected $fillable = [
        'promotion_type_id',
        'promotion_type_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
