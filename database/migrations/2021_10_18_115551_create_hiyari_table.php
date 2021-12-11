<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiyariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiyari', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('work_id');
            $table->string('train_id');
            $table->string('user_id');
            $table->string('title');
            $table->text('text');
            $table->timestamp('register');
            $table->date('day');
            $table->Time('time');
            $table->string('age_id');
            $table->string('jobs_id');
            $table->string('place');
            $table->string('operation_id');
            $table->string('measures');
            $table->string('day_of_week');
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
        Schema::dropIfExists('hiyari');
    }
}
