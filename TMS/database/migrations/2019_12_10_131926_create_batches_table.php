<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('section_id')->index('bat_section')->nullable();
            $table->unsignedInteger('project_id')->index('bat_project')->nullable();
            $table->unsignedInteger('district_id')->index('bat_district')->nullable();
            $table->unsignedInteger('upazila_id')->index('bat_upazila')->nullable();
            $table->unsignedInteger('course_id')->index('bat_course');
            $table->unsignedInteger('center_id')->index('bat_center');
            $table->unsignedInteger('batch_no')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['active', 'pending', 'inactive'])->default('active');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('batches');
    }
}
