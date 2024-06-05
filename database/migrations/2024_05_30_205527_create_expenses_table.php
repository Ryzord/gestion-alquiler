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
        Schema::create('expenses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('cascade');
            $table->string('concept');
            $table->date('date');
            $table->string('provider_nif')->nullable();
            $table->decimal('expense', 8, 2);
            $table->decimal('iva', 8, 2)->nullable();
            $table->decimal('total_iva', 8, 2)->nullable();
            $table->decimal('total_invoice', 8, 2);
            $table->boolean('paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
