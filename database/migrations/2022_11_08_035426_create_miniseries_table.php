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
            $table->string('img');
            $table->date('tgl_tayang');
            $table->string('producer');
            $table->string('director');
            $table->string('artist')->nullable();
            $table->string('trailer')->nullable();
            $table->string('link')->nullable();
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
