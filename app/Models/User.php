<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class User extends BaseModel
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'name',
        'address',
        'level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
