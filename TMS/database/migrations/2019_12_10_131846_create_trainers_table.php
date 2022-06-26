<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->index('trainer_name');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedSmallInteger('designation_id')->nullable();
            $table->string('designation_name', 191)->nullable();
            $table->unsignedSmallInteger('organization_id')->nullable();
            $table->string('organization_name', 191)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email');
            $table->string('nid', 100)->nullable();
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
            $table->unsignedInteger('created_by_section_id')->nullable();
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
        Schema::dropIfExists('trainers');
    }
}
