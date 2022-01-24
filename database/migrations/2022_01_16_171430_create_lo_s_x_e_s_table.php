<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoSXESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lo_s_x_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('soLo', 50);
            $table->date('ngaySX'); //benh
            $table->integer('tinhTrang')->default(1);
            $table->string('tenNSX', 100)->nullable();
            $table->string('quocGia', 50)->nullable();
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
        Schema::dropIfExists('lo_s_x_e_s');
    }
}
