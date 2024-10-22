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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            //Cabins FK
            $table->foreignId('cabins_id');
            //Falta FK de Users
            $table->foreignId("users_id");
            
            $table->timestamps();

            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('cabins_id')
            ->references('id')->on('cabins')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
