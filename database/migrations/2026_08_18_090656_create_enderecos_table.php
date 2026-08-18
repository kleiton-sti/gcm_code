<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger('codigo_ibge')->unique();
            $table->string('cidade');
            $table->char('uf', 2);
            $table->timestamps();

            $table->index('uf');
            $table->index('cidade');
        });

        DB::statement('ALTER TABLE enderecos CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
