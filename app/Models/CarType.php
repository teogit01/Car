<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class CarType extends BaseModel
{
    protected $table = 'cars_type';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'name',
        'seating',
        'model',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;

    public function __construct()
    {
        $this->fillable_list = $this->fillable;         // trường fillable sẽ truyền vào biến fillable_list
    }

    public function base_update(Request $request)
    {
        // $filter_param = $request->only($this->$fillable);
        $this->update_conditions = [
            'id' => 1
        ];
        return parent::base_update($this->request);
    }

    public function cardetail()
    {
        return $this->hasMany(CarDetail::class, 'id');
    }
}
