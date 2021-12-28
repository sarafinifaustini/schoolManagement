<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
              $table->increments('id');
            $table->date('event_date');
            $table->timestamps();
            //  $table->id();
            // $table->string('status');
            // // $table->foreignId('te_id')->nullable()->constrained('subjects');
            // $table->foreignId('subject_id')->references('id')->on('subjects');
            $table->foreignId('user_id')->nullable()->constrained('users');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}