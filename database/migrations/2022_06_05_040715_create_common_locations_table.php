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
        if (Schema::hasTable('common_locations')) {
            // Should we do something?
            return;
        }

        Schema::create('common_locations', function (Blueprint $table) {
            $table->id();
            $table->string("location");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('common_locations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
