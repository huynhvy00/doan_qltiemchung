<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichSuTiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_su_tiems', function (Blueprint $table) {
            $table->id();
            $table->string('id_Tre');
            $table->string('id_VX');
            $table->integer('id_NV');
            $table->integer('id_PhieuTiem');
            $table->date('ngayTiem');
            $table->string('bieuHienTruoc')->default('Bình Thường');
            $table->string('bieuHienSau')->default('Bình thường');
            $table->decimal('chieuCao',4,1);
            $table->decimal('canNang',4,1);
            $table->decimal('nhietDo',3,1);
            $table->integer('nhipTim');

            $table->integer('tinhTrang')->default(0);
            // id_Tre
            // id_NV
            // id_ChiTietMuiTiem
            // id_PhieuTiem
            // id_VX
            // ngayTiem
            // bieuHienTruoc
            // bieuHienSau
            // chieuCao
            // canNang
            // nhipTim
            // tinhTrang
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
        Schema::dropIfExists('lich_su_tiems');
    }
}
