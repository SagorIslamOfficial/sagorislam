<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headings', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading')->nullable();
            $table->text('about_sub_text')->nullable();
            $table->string('skill_heading')->nullable();
            $table->text('skill_sub_text')->nullable();
            $table->string('fact_heading')->nullable();
            $table->text('fact_sub_text')->nullable();
            $table->string('testimonial_heading')->nullable();
            $table->text('testimonial_sub_text')->nullable();
            $table->string('resume_heading')->nullable();
            $table->text('resume_sub_text')->nullable();
            $table->string('service_heading')->nullable();
            $table->text('service_sub_text')->nullable();
            $table->string('portfolio_heading')->nullable();
            $table->text('portfolio_sub_text')->nullable();
            $table->string('contact_heading')->nullable();
            $table->text('contact_sub_text')->nullable();
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
        Schema::dropIfExists('headings');
    }
}
