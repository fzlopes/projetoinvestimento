<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institution_id');
            $table->string('name', 45);
            $table->text('description');
            $table->text('index');
            $table->decimal('interest_rate');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('institution_id')->references('id')->on('institutions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}

}
