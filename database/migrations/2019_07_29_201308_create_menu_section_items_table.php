<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_section_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('menu_section_id')->unsigned();
            $table->string('title')->comment('タイトル');
            $table->timestamps();
            $table->foreign('menu_section_id')->references('id')->on('menu_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_section_items');
    }
}
