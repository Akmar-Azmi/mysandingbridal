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
        if (!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('whatsapp_code')->nullable();
                $table->string('whatsapp_number')->nullable();
                $table->string('email')->nullable();
                $table->text('address')->nullable();
                $table->string('open_time')->nullable();
                $table->string('close_time')->nullable();
                $table->string('location_embed')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
