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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->text('description');
            $table->enum('status', ['Available', 'En route', 'Not available'])->default('Not available');
            $table->unsignedBigInteger('taxi_id')->unique();
            $table->unsignedBigInteger('route_id')->nullable()->default(Null);
            $table->string('payment_method');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('taxi_id')->references('id')->on('taxis');
            $table->foreign('route_id')->references('id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
