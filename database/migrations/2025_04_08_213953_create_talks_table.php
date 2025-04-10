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
        Schema::create('talks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstract');
            // $table->unsignedBigInteger('conference_id');
            // $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');

        $table->foreignId('conference_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talks', function (Blueprint $table) {
            $table->dropForeign(['conference_id']);
        });

        Schema::dropIfExists('talks');
    }
};
