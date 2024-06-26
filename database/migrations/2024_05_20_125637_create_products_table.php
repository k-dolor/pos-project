<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); 
            $table->string('product_image')->nullable();
            $table->string('product_name', 55);
            $table->string('artist', 55);
            $table->string('genre', 55);
            $table->date('release_date');
            $table->string('price',55);
            $table->string('stock');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps(); 
            $table->softDeletes();

            // FOreign key constraint-------
          
            $table->foreign('supplier_id')
            ->references('supplier_id')
            ->on('suppliers')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
