<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lara extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
                Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name')->default();
                        $table->string('slug')->default();
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
		Schema::drop('projects');
	}

}
