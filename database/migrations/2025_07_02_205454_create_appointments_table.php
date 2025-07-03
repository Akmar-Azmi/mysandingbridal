<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('full_name');
            $table->integer('age');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('wedding_package');
            $table->date('date');
            $table->time('time');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
