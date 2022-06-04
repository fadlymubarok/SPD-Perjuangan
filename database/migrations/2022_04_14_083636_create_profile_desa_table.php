<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_desa', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('address', 50);
            $table->string('picture', 30);
            $table->string('background', 30);
            $table->text('about_web');
            $table->text('visi');
            $table->text('misi');
            $table->text('prestasi');
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
        Schema::dropIfExists('profile_desa');
    }
}
