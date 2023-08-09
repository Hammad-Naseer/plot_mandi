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
        Schema::create('dealer_details', function (Blueprint $table) {
            $table->id("dealer_id");
            $table->integer("user_id");
            $table->string("office_picture");
            $table->string("office_video");
            $table->string("cnic");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealer_details');
    }
};
