<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhuHuynhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phu_huynhs', function (Blueprint $table) {
            $table->id();
            $table->string('tenPH');
            $table->string('email')->unique();
            $table->string('sdt', 10);
            $table->string('diaChi', 255);
            $table->string('CMND',)->unique();
            $table->string('anh')->default('avt.png');
            $table->date('ngaySinh')->nullable();
            $table->boolean('gioiTinh')->nullable();
            $table->string('code',10);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('tinhTrang')->default(1);
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
        Schema::dropIfExists('phu_huynhs');
    }
}
