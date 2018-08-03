<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_type')->default(0);
            $table->string('name');
            $table->string('short_description')->nullable();
            $table->mediumText('long_description')->nullable();
            $table->decimal('price',10,2);
            $table->integer('qty')->default(0);
            $table->string('img_url');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('salon_items');
    }
}
