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
        Schema::create('pc-specification', function (Blueprint $table) {
            $table->id();
            $table->string('mobo');
            $table->string('cpu');
            $table->string('ram');
            $table->string('gpu');
            $table->string('hdd');
            $table->string('ssd');
            $table->string('psu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc-specification');
    }
};
