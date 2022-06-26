<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_trainers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('center_id')->index('batch_t_center');
            $table->unsignedBigInteger('batch_id')->index('trainer_batch_id');
            $table->unsignedBigInteger('trainer_id')->index('batch_trainer');
            $table->enum('status', ['active', 'pending', 'inactive'])->default('active');
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
        Schema::dropIfExists('batch_trainers');
    }
}
