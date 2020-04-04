<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Transport extends BaseModel
{
    protected $table = 'transports';

    protected $primaryKey = 'transport_id';

    protected $keyType = 'int';

    protected $fillable = [
        'transport_id',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
