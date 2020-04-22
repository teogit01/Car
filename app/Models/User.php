<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class User extends BaseModel
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'username',
        'password',
        'name',
        'address',
        'tel',
        'user_type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
