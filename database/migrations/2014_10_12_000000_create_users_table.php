<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');

            $table->string('password')->nullable();
            $table->string('social_id')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('role')->default(0);               //Phân quyền 0: Khách hàng, 1: Admin
            $table->integer('status')->default(0);               //Trạng thái TK 0: Chưa kích hoạt

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();                               //Nhớ mật khẩu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
