<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietMuiTiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_mui_tiems', function (Blueprint $table) {
            $table->id();
            $table->integer('id_VX');
            $table->integer('id_NV')->default(0);
            $table->integer('id_PhieuDK');

            $table->date('ngayTiem');
            $table->decimal('donGia');
            $table->integer('soLuong')->default(1);
            $table->string('ghiChu',)->default('Không có');
            $table->integer('tinhTrang')->default(0);

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
        Schema::dropIfExists('chi_tiet_mui_tiems');
    }
}
