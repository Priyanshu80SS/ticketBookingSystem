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
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();
            $table->foreignId('seat_id')->constrained()->onDelete('cascade'); //links to the seats table
            $table->foreignId('destination_id')->constrained()->onDelete('cascade'); //links to the destinations table
            $table->enum('seat_type', ['Single', 'Double']); //seats type - single or double
            $table->decimal('total_price', 8, 2); //total price based on seat and destination
            $table->boolean('is_confirmed')->default(false); //booking status: confirmed or pending
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
