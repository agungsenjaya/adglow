<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miniseries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img_logo');
            $table->string('img_background');
            $table->string('img_clip');
            $table->json('img_highlight')->nullable();
            $table->json('genre_id')->nullable();
            $table->date('tgl_tayang')->nullable();
            $table->string('episode')->nullable();
            $table->string('season')->nullable();
            $table->string('producer');
            $table->string('director');
            $table->string('artist')->nullable();
            $table->string('trailer')->nullable();
            $table->longText('link')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miniseries');
    }
}
