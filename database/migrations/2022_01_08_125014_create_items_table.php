<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price', 12, 2);
            $table->string('image');
            $table->text('description')->nullable();
            $table->text('additional_info')->nullable();

            $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->nullOnDelete()
            ->cascadeOnUpdate();
            $table->bigInteger('sub_category')->unsigned()->nullable();
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
        Schema::dropIfExists('items');
    }
}
