<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onUpdate('cascade');
            $table->string('slug');
            $table->string('img');
            $table->string('img_judul');
            $table->string('img_owner');
            $table->integer('dilihat');
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
        Schema::dropIfExists('artikels');
    }
}
