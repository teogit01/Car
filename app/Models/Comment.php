<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Comment extends BaseModel
{
    protected $table = 'comments';

    protected $primaryKey = 'comment_id';

    protected $keyType = 'int';

    protected $fillable = [
        'comment_id',
        'user_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
