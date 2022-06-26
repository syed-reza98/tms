<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('section_id')->index('cen_section')->nullable();
            $table->unsignedInteger('project_id')->index('cen_project')->nullable();
            $table->unsignedInteger('district_id')->index('cen_district')->nullable();
            $table->unsignedInteger('upazila_id')->index('cen_upazila')->nullable();
            $table->string('name', 191);
            $table->string('location', 255);
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
        Schema::dropIfExists('centers');
    }
}
