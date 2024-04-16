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
        Schema::create('technical_user_sub_services', function (Blueprint $table) {
            $table->integer('id');
            $table->foreignId('sub_service_id')->references('id')->on('sub_services');
            $table->unique(['id','sub_service_id']);
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_user_sub_services');
    }
};
