<?php

namespace App\Models;

use App\Models\CarDetail;
use App\Models\Base\BaseModel;
use Illuminate\Http\Request;

class Invoice extends BaseModel
{
    protected $table = 'invoices';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'address',
        'name',
        'status',
        'phone',
        'date',
        'time',
        'service',
        'item_count',
        'is_paid',
        'payment_method',
        'grand_total',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;

    public function items() 
    {
        return $this->belongsToMany(CarDetail::class, 'invoices_detail', 'invoice_id', 'car_detail_id');
    }
    public function cardetail()
    {
        return $this->belongsTo(App\CarDetail, 'car_detail_id', 'id');
    }

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
}
