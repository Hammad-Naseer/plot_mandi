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
        Schema::create('property_bid', function (Blueprint $table) {
            $table->id("property_bid_id");
            $table->integer("property_id");
            $table->text("proposal_description");
            $table->integer("property_status")->default(0);
            $table->integer("submitted_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_bid');
    }
};
