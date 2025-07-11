<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('event_type');
            $table->integer('budget');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->text('notes')->nullable();
            $table->timestamps(); // for created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
