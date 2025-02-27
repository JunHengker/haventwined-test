<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', ['festival', 'fair', 'bazaar', 'exhibiton', 'expo', 'pameran', 'pensi', 'acara_sekolah', 'acara_kampus', 'other']);
            $table->date('event_date');
            $table->date('registration_start');
            $table->date('registration_end');
            $table->time('time_start');
            $table->time('time_end');
            $table->integer('participant_estimate')->default(0);
            $table->string('location');
            $table->string('city');
            $table->text('detailed_location')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};