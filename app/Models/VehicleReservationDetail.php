<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class VehicleReservationDetail extends BaseModel
{
    protected $table = 'vehicle_reservation_details';

    protected $primaryKey = 'vehicle_reservation_detail_id';

    protected $keyType = 'int';

    protected $fillable = [
        'vehicle_reservation_detail_id',
        'transport_id',
        'comment_id',
        'promotion_id',
        'car_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}
