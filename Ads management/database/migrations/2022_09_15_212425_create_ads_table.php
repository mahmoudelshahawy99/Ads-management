<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('title');
            $table->longtext('description');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('advertiser_id');
            $table->date('start_date');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
};
