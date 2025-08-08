<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('account_type')->default('user')->after('role'); // user | journalist
            $table->string('affiliation_office')->nullable()->after('account_type'); //المكتب الوطني/المكتب الولائي نصا
            $table->string('wilaya_name')->nullable()->after('affiliation_office'); // تخزين اسم الولاية بسيط
            $table->enum('approval_status',['pending','approved','rejected'])->default('pending')->after('wilaya_name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['account_type','affiliation_office','wilaya_name','approval_status']);
        });
    }
};
