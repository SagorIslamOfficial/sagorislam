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
            $table->bigInteger('category_id')->unsigned();

            $table->string('image');
            $table->string('name');
            $table->string('slug');
            $table->string('pd_title');
            $table->string('pd_section');
            $table->string('pd_s_content');
            $table->string('pd_link');
            $table->string('pd_link_text');
            $table->longText('pd_description');
            $table->longText('pd_images');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
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
