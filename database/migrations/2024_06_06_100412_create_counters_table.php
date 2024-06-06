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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('background');
            $table->string('icon_one');
            $table->string('count_one');
            $table->string('name_one');

            $table->string('icon_two');
            $table->string('count_two');
            $table->string('name_two');

            $table->string('icon_three');
            $table->string('count_three');
            $table->string('name_three');

            $table->string('icon_four');
            $table->string('count_four');
            $table->string('name_four');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
