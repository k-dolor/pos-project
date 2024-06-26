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
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->timestamps();


        // FOreign key constraint-------
            $table->foreign('user_id')
            ->references('user_id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('payment_method_id')
            ->references('payment_method_id')
            ->on('payment_methods')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('discount_id')->nullable();
            $table->foreign('discount_id')
            ->references('id')
            ->on('discounts');

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
