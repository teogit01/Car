<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->comment('id');
                $table->string('username')->comment('tên đăng nhập');
                $table->string('password')->comment('mật khẩu');
                $table->string('name')->nullable()->comment('họ và tên');
                $table->string('address')->nullable()->comment('địa chỉ');
                $table->string('tel')->nullable()->comment('sdt');
                $table->string('email')->nullable()->comment('email');
                $table->string('avatar')->nullable()->comment('avatar');
                $table->string('role')->nullable()->comment('vai tro admin, user');
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
                $table->unique(['username']);
            });
            //DB::statement("ALTER TABLE `users` comment 'Thông tin người dùng'");
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
