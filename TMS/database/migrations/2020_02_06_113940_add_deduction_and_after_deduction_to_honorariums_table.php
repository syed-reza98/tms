<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeductionAndAfterDeductionToHonorariumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('honorariums', function (Blueprint $table) {
            $table->enum('deduction_type',['fixed','percentage'])->default('fixed')->after('honorarium_amount');
            $table->decimal('after_deduction',5,2)->after('deduction_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('honorariums', function (Blueprint $table) {
            $table->dropColumn(['deduction_type','after_deduction']);
        });
    }
}
