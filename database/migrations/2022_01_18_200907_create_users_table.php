<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('idLoaiNV');
            $table->string('tenNV');
            $table->string('email')->unique();
            $table->string('sdt', 10);
            $table->string('diaChi')->nullable();
            $table->string('CMND', 50)->unique();
            $table->string('anh')->default('avt.png');
            $table->date('ngaySinh')->nullable();
            $table->boolean('gioiTinh')->nullable();
            $table->string('code', 10); //khuvuc
            $table->string('password');
            $table->integer('tinhTrang')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
