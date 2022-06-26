<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainees', function (Blueprint $table) {
            $table->unsignedInteger('upazila_id')->nullable()->index('trainee_upazila_id')->after('nid');
            $table->unsignedMediumInteger('district_id')->nullable()->index('trainee_district_id')->after('nid');
            $table->unsignedMediumInteger('division_id')->nullable()->index('trainee_division_id')->after('nid');
            $table->string('address', 300)->nullable()->after('nid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainees', function (Blueprint $table) {
            $table->dropColumn(['upazila_id', 'district_id', 'division_id', 'address']);
        });
    }
}
