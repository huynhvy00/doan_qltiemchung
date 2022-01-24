<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->integer('id_DoiTuong');
            $table->string('code');//benh
            $table->string('code_lo',50); //loSX
            $table->string('tenVX');
            $table->date('ngaySX');
            $table->date('hanSD');
            $table->integer('soLuong')->nullable();
            $table->decimal('donGia')->nullable();
            $table->string('ghiChu')->nullable();
            $table->integer('tinhTrang')->default(1);
            $table->string('anh')->default('vx.png');
            $table->date('ngayNhap');
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
        Schema::dropIfExists('vaccines');
    }
}
