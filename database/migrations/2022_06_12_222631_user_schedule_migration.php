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
        //
        if (!Schema::hasTable('user_schedules')) {
            Schema::create('user_schedules', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->integer('day');
                
                $table->time('time');

                $table->unsignedBigInteger('destination_id');
                
                $table->boolean('active');
                $table->boolean('repeat');

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('destination_id')->references('id')->on('common_locations');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
