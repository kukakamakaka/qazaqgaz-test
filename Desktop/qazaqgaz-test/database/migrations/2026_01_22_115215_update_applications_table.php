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
    Schema::table('applications', function (Blueprint $table) {
        $table->string('subject')->nullable(); // Тема
        $table->string('category')->nullable(); // Категория
        $table->string('priority')->nullable(); // Приоритет
        $table->date('deadline')->nullable(); // Срок
        $table->string('status')->default('new'); // Статус (new, in_progress, completed, rejected)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
