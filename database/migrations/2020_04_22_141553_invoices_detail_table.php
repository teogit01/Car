<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoicesDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('invoices_detail')) {
            Schema::create('invoices_detail', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->integer('car_detail_id')->unsigned()->comment('id xe cụ thể');
                $table->integer('invoice_id')->unsigned()->comment('id phiếu đặt');
                $table->integer('service_id')->unsigned()->comment('id dịch vụ');
                

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
            DB::statement("ALTER TABLE `invoices_detail` comment 'Thông tin chi tiết phiếu đặt'");
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
