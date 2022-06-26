<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeductionAmountToHonorariumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('honorariums', function (Blueprint $table) {
           $table->decimal("deduction_amount",5,2)->nullable()->after("deduction_type");
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
            $table->dropColumn("deduction_amount");
        });
    }
}
