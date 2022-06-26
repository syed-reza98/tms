<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['doict', 'government','other'])->default('doict');
            $table->string('name', 191)->index('trainee_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedSmallInteger('designation_id')->nullable();
            $table->string('designation_name', 191)->nullable();
            $table->unsignedSmallInteger('organization_id')->nullable();
            $table->string('organization_name', 191)->nullable();
            $table->char('mobile', 15)->nullable();
            $table->string('email');
            $table->string('nid', 100)->nullable();
            $table->unsignedInteger('created_by_section_id')->nullable();
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
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
        Schema::dropIfExists('trainees');
    }
}
