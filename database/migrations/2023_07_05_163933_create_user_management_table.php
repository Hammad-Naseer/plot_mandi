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
        Schema::create('user_management', function (Blueprint $table) {
            $table->id("user_management_id");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string("phone", 50)->nullable();
            $table->string("address", 200)->nullable();
            $table->integer("company_id");
            $table->integer("location_id")->default(0);
            $table->integer("designation_id")->default(0);
            $table->integer("department_id")->default(0);
            $table->integer("role_id")->default(0);
            $table->string("profile_image")->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_management');
    }
};
