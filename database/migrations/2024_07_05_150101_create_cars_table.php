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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("maker");
            $table->string("model");
            $table->string("year");
            $table->enum("transmission" , ["manual", "automatic"]);
            $table->string("fuel");
            $table->integer("doors");
            $table->string("price");
            $table->string("mileage");
            $table->string("engine");
            $table->string("power");
            $table->string("seats");
            $table->string("description");
            $table->string("image");
            $table->boolean("is_active")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
