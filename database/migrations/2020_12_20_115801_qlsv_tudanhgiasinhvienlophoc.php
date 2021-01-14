<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QlsvTudanhgiasinhvienlophoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qlsv_tudanhgiasinhvienlophocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_sinhvienlophoc');
            $table->bigInteger('id_tudanhgia');
            $table->string('cautraloi1');
            $table->string('cautraloi2');
            $table->string('cautraloi3');
            $table->string('cautraloi4');
            $table->string('cautraloi5');
            $table->string('nguoitao');
            $table->string('nguoisua');
            $table->integer('deleted_at');
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
        Schema::dropIfExists('qlsv_tudanhgiasinhvienlophocs');
    }
}
