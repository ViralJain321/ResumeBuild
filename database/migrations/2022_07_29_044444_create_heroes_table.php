<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String("name");
            $table->String("twitter_id")->nullable();
            $table->String("facebook_id")->nullable();
            $table->String("instagram_id")->nullable();
            $table->String("skype_id")->nullable();
            $table->String("linkedIn_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
};
