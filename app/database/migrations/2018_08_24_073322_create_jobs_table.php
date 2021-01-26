<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_category_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('city_id');
            $table->text('title');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('facebook');
            $table->string('tweeter');
            $table->string('website');
            $table->string('address');
            $table->integer('view_count')->default(0);
            $table->text('description');
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
        Schema::dropIfExists('jobs');
    }
}
