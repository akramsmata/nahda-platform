<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('members_table', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',255);
            $table->string('father_name',255)->nullable();
            $table->string('mother_name',255)->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedBigInteger('birth_wilaya_id')->nullable();
            $table->string('birth_commune',255)->nullable();
            $table->string('national_id',100)->nullable();
            $table->string('voter_id',100)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('email',255)->nullable()->unique();
            $table->string('photo')->nullable();
            $table->string('id_card_image')->nullable();
            $table->string('voter_card_image')->nullable();
            $table->string('marital_status',50)->nullable();
            $table->string('job',255)->nullable();
            $table->text('admin_notes')->nullable();
            $table->date('joined_at')->nullable();
            $table->unsignedBigInteger('wilaya_id')->nullable();
            $table->timestamps();

            $table->foreign('wilaya_id')->references('id')->on('wilayas_table')->onDelete('set null');
            $table->foreign('birth_wilaya_id')->references('id')->on('wilayas_table')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members_table');
    }
};
