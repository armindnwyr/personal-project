<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arminds', function (Blueprint $table) {
            $table->id();
            $table->string("a_nombre",80);
            $table->string("a_paterno",80);
            $table->string("a_materno",80);
            $table->string("a_link",100);
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
        Schema::dropIfExists('arminds');
    }
}
