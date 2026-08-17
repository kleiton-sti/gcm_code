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
        Schema::create('guardas_civil', function (Blueprint $table) {
           $table->id();
           $table->string('token')->unique();
           $table->string('nome');
           $table->string('cpf')->unique();
           $table->string('rg')->unique();
           $table->date('data_nascimento');
           $table->string('naturalidade');
           $table->enum('tipo_sanguineo', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
           $table->string('cargo');
           $table->string('porte');
           $table->string('afiliação');
           $table->string('matricula')->unique();
           $table->date('admissão');
           $table->date('expedição');
           $table->date('validade');
           $table->string('caminho_foto')->nullable();
           $table->timestamps();
           $table->softDeletes();
           $table->text('motivo_delete')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardas_civil');
    }
};
