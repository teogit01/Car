<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehicleReservationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('vehicle_reservation_details')) {
            Schema::create('vehicle_reservation_details', function (Blueprint $table) {
                $table->increments('vehicle_reservation_detail_id')->comment('id');
                $table->integer('transport_id')->unsigned()->comment('id vận chuyển');
                $table->integer('comment_id')->unsigned()->comment('id vận chyển');
                $table->integer('promotion_id')->unsigned()->comment('id khuyến mãi');
                $table->integer('car_id')->unsigned()->comment('id xe');
                $table->integer('status')->comment('trạng thái');

                // log time
                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày tạo');

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                    ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                    ->nullable()
                    ->comment('ngày xóa tạm');
            });
            DB::statement("ALTER TABLE `vehicle_reservation_details` comment 'Thông tin bảng chi tiết đặt xe'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
