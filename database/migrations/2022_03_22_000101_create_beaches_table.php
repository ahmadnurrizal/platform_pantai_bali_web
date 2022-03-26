<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beaches', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            $table->string("beach_name");
            $table->text('beach_description');
            $table->string('beach_location');
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
        Schema::dropIfExists('beaches');
    }
}
