<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cars_detail')) {
            Schema::create('cars_detail', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->string('code', 191)->comment('mã xe');
                $table->string('name')->comment('tên xe');
                $table->text('image')->nullable()->comment('hình xe');
                $table->decimal('rental', 10, 3)->comment('giá thuê');
                $table->integer('status')->default(0)->comment('trạng thái');
                $table->text('description')->nullable()->comment('mô tả xe');
                $table->string('number')->comment('bản số xe');
                $table->string('frame')->nullable()->comment('số khung');
                $table->integer('car_type_id')->nullable()->unsigned()->comment('id loại xe');
                $table->integer('user_id')->nullable()->unsigned()->comment('id người dùng');

                // log time
                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày tạo');

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'))
                    ->comment('ngày cập nhật');

                $table->timestamp('deleted_at')
                    ->nullable()
                    ->comment('ngày xóa tạm');
                // Setting unique
                $table->unique(['code']);
            });
            //DB::statement("ALTER TABLE `cars_detail` comment 'Thông tin bảng xe'");
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
