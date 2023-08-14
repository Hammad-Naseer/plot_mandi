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
        Schema::create('dealar_media', function (Blueprint $table) {
            $table->id("dealer_media_id");
            $table->integer("dealer_id");
            $table->string("dealer_office_picture")->nullable();
            $table->string("dealer_office_video")->nullable();
            $table->string("dealer_office_document")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealar_media');
    }
};
