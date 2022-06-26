<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191);
            $table->string('description')->nullable();
            $table->unsignedInteger('duration')->default(0)->comment('Total Duration Days');
            $table->unsignedInteger('created_by_section_id')->nullable()->index('crs_created_by_center');
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
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
        Schema::dropIfExists('courses');
    }
}
