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
        Schema::create('incomes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->bigInteger('intermediary_id')->unsigned()->index()->nullable();
            $table->foreign('intermediary_id')->references('id')->on('intermediaries')->onDelete('set null');
            
            $table->bigInteger('apartment_id')->unsigned()->index();
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

            $table->bigInteger('rate_id')->unsigned()->index();
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');

            $table->date('check_in');
            $table->date('check_out');
            $table->integer('nights');
            $table->string('client_name');
            $table->string('client_nif');
            $table->string('client_phone');
            $table->integer('number_of_people');
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total_iva', 8, 2);
            $table->decimal('total_invoice', 8, 2);
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
