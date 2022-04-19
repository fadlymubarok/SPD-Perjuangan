<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAparaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_aparatur', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('position', 30);
            $table->string('kedudukan', 30);
            $table->string('tugas', 30);
            $table->string('fungsi', 30);
            $table->string('keterangan', 100);
            $table->string('picture', 30);
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
        Schema::dropIfExists('profile_aparatur');
    }
}
