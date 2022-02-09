<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuDangKyTiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_dang_ky_tiems', function (Blueprint $table) {
            $table->id();
            $table->integer('id_Tre');
            $table->integer('id_NV');
            $table->date('ngayDKTiem');
            $table->date('ngayTao');
            $table->decimal('tongTien');
            $table->integer('tinhTrang')->default(1);
            $table->integer('soMui');
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
        Schema::dropIfExists('phieu_dang_ky_tiems');
    }
}
