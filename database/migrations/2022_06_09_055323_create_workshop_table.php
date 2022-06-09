<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshop', function (Blueprint $table) {
            $table->string('name');
            $table->timestamps('start')->nullable();
            $table->timestamps('end')->nullable();
            $table->string('event_id');
            $table->string('workshop');
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
        Schema::table('workshop', function (Blueprint $table) {
            //
        });
    }
}
