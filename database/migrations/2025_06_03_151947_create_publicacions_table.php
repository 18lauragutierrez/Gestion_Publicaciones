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
    Schema::create('publicacions', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('cuerpo');
        $table->string('imagen')->nullable();
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacions');
    }
};
