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
            $table->text('kedudukan');
            $table->text('tugas');
            $table->text('fungsi');
            $table->text('keterangan');
            $table->string('picture', 255);
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
