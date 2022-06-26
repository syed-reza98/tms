<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHonorariumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honorariums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('batch_id')->index('batch_honorarium');
            $table->unsignedInteger('center_id')->index('batch_honorarium_tne_center');
            $table->unsignedBigInteger('trainee_id')->index('batch_honorarium_trainee');
            $table->decimal('honorarium_amount', 8, 2);
            $table->date('honorarium_pay_date')->default(null);
            $table->softDeletes();
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
        Schema::dropIfExists('honorariums');
    }
}
