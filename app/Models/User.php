<?php

namespace App\Models;

use Illuminate\Http\Request;
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

    public function __construct(){
        $this->fillable_list = $this->fillable;
    }

    public function base_update(Request $request){
        $this->updata_conditions = [
            'user_id' => 1
        ];
        return parent::base_update($this->request);
    }

}
