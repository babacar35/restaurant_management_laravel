<?php

use Illuminateatabase\Migrations\Migration;
se Illuminate\Database\Schema\Blueprint;
se Illuminate\Support\Facades\Schema;
return new class extends Migration

   public function up(): void
   {
       Schema::table('users', function (Blueprint $table) {
           $table->foreignId('role_id')->nullable()->constrained()->after('id');
           $table->boolean('is_active')->default(true)->after('remember_token');
       });
   }
    public function down(): void
   {
       Schema::table('users', function (Blueprint $table) {
           $table->dropForeign(['role_id']);
           $table->dropColumn(['role_id', 'is_active']);
       });
   }
;