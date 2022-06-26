<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_specializations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trainer_id')->index('tps_trainer');
            $table->unsignedSmallInteger('specialization_id')->index('tsp_specialization');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('trainer_specializations');
    }
}
