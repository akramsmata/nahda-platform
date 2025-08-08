<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('journalists_table', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',255);
            $table->string('media',255)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('email',255)->nullable();
            $table->unsignedBigInteger('wilaya_id')->nullable();
            $table->string('press_card_number',100)->nullable();
            $table->timestamps();

            $table->foreign('wilaya_id')->references('id')->on('wilayas_table')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journalists_table');
    }
};
