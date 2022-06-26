<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_trainees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('center_id')->index('batch_tne_center');
            $table->unsignedBigInteger('batch_id')->index('trainee_batch_id');
            $table->unsignedBigInteger('trainee_id')->index('batch_trainee');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *php
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batch_trainees');
    }
}
