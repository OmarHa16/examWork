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
        Schema::create('technical_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phoneNumber')->unique();
            $table->string('password');
            $table->string('city');
            $table->string('mainService');
            $table->integer('subServicesList')->references('id')->on('technical_user_sub_services');
            $table->string('bankName');
            $table->Integer('statementNumber');
            $table->string('address');
            $table->double('address_latitude');
            $table->double('address_longitude');
            $table->text('profileImage');
            $table->text('residenceImage');
            $table->boolean('Approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_users');
    }
};
