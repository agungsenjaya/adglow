<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentaries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('img_clip');
            $table->json('img_highlight')->nullable();
            $table->date('tgl_tayang')->nullable();
            $table->string('producer')->nullable();
            $table->string('director')->nullable();
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
        Schema::dropIfExists('documentaries');
    }
}
