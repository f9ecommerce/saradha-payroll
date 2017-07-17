<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salaries', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('no_of_leaves');
            $table->decimal('basic_pay');
            $table->decimal('hra');
            $table->decimal('leave_encash');
            $table->decimal('epf_fund');
            $table->decimal('prof_tax');
            $table->decimal('gross_slary');
            $table->decimal('deductions');
            $table->decimal('net_salary');
            $table->integer('month');
            $table->integer('year');
            $table->integer('employee_id');
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
		Schema::drop('salaries');
	}

}
