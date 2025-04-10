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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status');
            $table->string('region');
            // $table->unsignedBigInteger('speaker_id');
            // $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
            $table->foreignId('speaker_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('conferences', function (Blueprint $table) {
            $table->dropForeign(['speaker_id']);
        });
        
        Schema::dropIfExists('conferences');
    }
};
