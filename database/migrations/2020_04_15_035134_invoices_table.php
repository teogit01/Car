<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->decimal('deposit', 10, 3)->comment('đặt cọc');
                $table->string('address')->comment('địa chỉ');
                $table->integer('delivery_id')->unsigned()->comment('id vận chuyển');
                $table->integer('comment_id')->unsigned()->comment('id bình luận');
                $table->integer('discount_id')->unsigned()->comment('id khuyến mãi');
                $table->integer('user_id')->unsigned()->comment('id nhân viên');

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
            DB::statement("ALTER TABLE `carts` comment 'Thông tin giỏ hàng'");
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
