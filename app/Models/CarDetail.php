<?php

namespace App\Models;
use App\Models\Invoice;

use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class CarDetail extends BaseModel
{
    protected $table = 'cars_detail';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'code',
        'name',
        'image',
        'rental',
        'status',
        'description',
        'number',
        'frame',
        'user_id',
        'car_type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;

    public function __construct() {
        $this->fillable_list = $this->fillable;         // trường fillable sẽ truyền vào biến fillable_list
    }
    public function invoice () 
    {
        return $this->hasMany(App\Invoice,'car_detail_id', 'id');
    }

    public function base_update(Request $request)
    {
        // $filter_param = $request->only($this->$fillable);
        $this->update_conditions = [
            'id' => 1
        ];
        
        return parent::base_update($this->request);
    }

    public function cartype()
    {
        return $this->belongsTo(CarType::class,'car_type_id','id');
    }
}
