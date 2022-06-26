<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('designations', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->char('code', 20)->unique();
			$table->string('name', 150);
			$table->string('name_bn', 300)->nullable();
			$table->smallInteger('ordering')->default(9999);
			$table->boolean('status')->default(1)->index();
			$table->integer('created_by_company_id')->unsigned()->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('designations');
	}

}
