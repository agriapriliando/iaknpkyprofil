<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menusubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->onUpdate('cascade');
            $table->string('judul', 100);
            $table->string('menusublink', 100)->nullable();
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
        Schema::dropIfExists('menusubs');
    }
}
