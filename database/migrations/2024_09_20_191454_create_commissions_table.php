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
        Schema::create('commissions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // User receiving the commission
            $table->unsignedBigInteger('purchase_id'); // Link to the purchase that generated the commission
            $table->decimal('amount', 10, 2); // Commission amount
            $table->boolean('is_referral')->default(false); // True if it is a referral commission
            $table->unsignedInteger('level')->nullable(); // Level of the commission (1-5)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade'); // Ensure Purchase model and table exist
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
