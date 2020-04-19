<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cars')) {
            Schema::create('cars', function (Blueprint $table) {
                $table->increments('car_id')->comment('id');
                $table->integer('user_id')->unsigned()->comment('id user');
                $table->integer('car_models_id')->unsigned()->comment('id loại xe');
                $table->string('car_name')->nullable()->comment('tên xe');
                $table->string('image')->nullable()->comment('hình xe');
                $table->decimal('rental_costs')->nullable()->comment('giá thuê');
                $table->integer('status')->nullable()->comment('trạng thái');
                $table->text('car_description')->nullable()->comment('mô tả xe');

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
            DB::statement("ALTER TABLE `cars` comment 'Thông tin bảng xe'");
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
