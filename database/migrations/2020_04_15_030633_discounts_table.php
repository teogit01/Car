<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('discounts')) {
            Schema::create('discounts', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->string('name')->comment('tên khuyến mãi');
                $table->dateTime('start')->comment('thời gian bắt đầu');
                $table->dateTime('end')->comment('thời gian kết thúc');
                $table->integer('user_id')->unsigned()->comment('id người dùng');
                $table->integer('discount_type_id')->unsigned()->comment('id loại khuyến mãi');
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
            DB::statement("ALTER TABLE `discounts` comment 'Thông tin bảng khuyến mãi'");
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
