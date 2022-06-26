<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('batch_id')->index('batch_attendance');
            $table->unsignedInteger('center_id')->index('batch_attendance_tne_center');
            $table->unsignedBigInteger('trainee_id')->index('batch_attendance_trainee');
            $table->unsignedBigInteger('schedule_id')->index('batch_attendance_schedule');
            $table->enum('attendance_status', ['present', 'absent', 'late_come', 'not_define'])->default('not_define');
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('batch_attendances');
    }
}
