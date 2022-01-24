<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreEmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tre_ems', function (Blueprint $table) {
            $table->id();
            $table->string('id_PH');
            $table->integer('id_DT');
            $table->string('tenTre')->nullable();
            $table->string('code')->nullable();
            $table->date('ngaySinh')->nullable();
            $table->boolean('gioiTinh')->nullable();
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
        Schema::dropIfExists('tre_ems');
    }
}
