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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('thumbnail');
            $table->integer('sku');
            $table->string('short_description');
            $table->text('long_description');
            $table->integer('stock_qty');
            $table->enum('is_active', ['yes', 'no']);
            $table->integer('created_by_id');
            $table->integer('updated_by_id')->nullable();
            $table->integer('deleted_by_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('slug'); 
            $table->index('sku'); 
            $table->index('is_active'); 
            $table->index('created_by_id');
            $table->index('updated_by_id');
            $table->index('deleted_by_id');
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropUnique(['slug']); 
            $table->dropIndex(['sku']); 
            $table->dropIndex(['is_active']); 
            $table->dropIndex(['created_by_id']); 
            $table->dropIndex(['updated_by_id']); 
            $table->dropIndex(['deleted_by_id']); 
            $table->dropIndex(['title']); 
        });
        
        Schema::dropIfExists('products');
    }
};
