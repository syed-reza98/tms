<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmationToBatchTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('batch_trainees', function (Blueprint $table) {
            $table->enum('confirmation', ['pending', 'confirmed','rejected'])->comment('Trainee Confirmation')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('batch_trainees', function (Blueprint $table) {
            $table->dropColumn('confirmation');
        });
    }
}
