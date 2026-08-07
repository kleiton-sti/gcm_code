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
        Schema::create('auditoria_dados', function (Blueprint $table) {
            $table->id();
            $table->string('status',50);
            $table->string('usuario',50);
            $table->string('ip',50)->nullable()->default(null);
            $table->text('descricao')->nullable();
            $table->text('objeto_alterado')->nullable()->default(null);
            $table->integer('objeto_id')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria_dados');
    }
};
