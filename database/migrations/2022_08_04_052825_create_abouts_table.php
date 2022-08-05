<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('tagline', 80)->nullable();
            $table->String('curr_designation')->nullable(false);
            $table->String('image')->nullable();
            $table->String('degree')->nullable();
            $table->date('dob')->nullable();
            $table->String("contact_no")->nullable();
            $table->String('email')->nullable();
            $table->String('city')->nullable();
            $table->String('freelance')->default("not available");
            $table->String("about_yourself")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
