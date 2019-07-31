<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('font_id')->unsigned();
            $table->bigInteger('wallpaper_id')->nullable()->unsigned();
            $table->date('date')->nullable()->comment('日付');
            $table->string('signature_title', 20)->comment('署名: タイトル');
            $table->string('signature_name', 20)->comment('署名: 担当者名');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('font_id')->references('id')->on('fonts')->onDelete('cascade');
            $table->foreign('wallpaper_id')->references('id')->on('wallpapers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
