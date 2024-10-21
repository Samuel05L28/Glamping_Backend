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
        Schema::create('cabins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            //Nivel FK
            $table->foreignId('cabinlevel_id');
            //Service FK
            // $table->foreignId('service_id');
            $table->integer('capacity')->unsigned();
            $table->timestamps();

            $table->foreign('cabinlevel_id')
                ->references('id')->on('cabin_levels')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            // $table->foreign('service_id')
            //     ->references('id')->on('service')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabins');
    }
};
