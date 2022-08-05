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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String("name")->nullable(false);
            $table->String("summary_description")->nullable();
            $table->String("education_course_name")->nullable(false);
            $table->String("education_st_year")->nullable();
            $table->String("education_end_year")->nullable();
            $table->String("education_institute_name")->nullable();
            $table->String("education_description")->nullable();
            $table->String("work_role")->nullable(false);
            $table->String("work_st_year")->nullable();
            $table->String("work_end_year")->nullable();
            $table->String("work_place")->nullable();
            $table->String("work_description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};
