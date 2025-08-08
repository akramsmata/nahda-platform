<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('activity_registrations_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable(); // link to members_table if applicable
            $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->boolean('attended')->default(false);
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities_table')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('member_id')->references('id')->on('members_table')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_registrations_table');
    }
};
