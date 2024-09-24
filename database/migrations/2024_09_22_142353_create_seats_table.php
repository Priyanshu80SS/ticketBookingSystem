<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {


            $table->id();
            $table->string('seat_number');
            $table->enum('seat_type', ['Single', 'Double']);
            $table->enum('status', ['Available', 'Booked'])->default('Available'); //seats status
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
