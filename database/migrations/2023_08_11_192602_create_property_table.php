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
        Schema::create('property', function (Blueprint $table) {
            $table->id("property_id");
            $table->string("property_title");
            $table->text("property_description");
            $table->integer("property_status");
            $table->integer("property_type");
            $table->integer("property_rooms");
            $table->float("property_price");
            $table->string("property_area");
            $table->string("property_address");
            $table->string("property_city");
            $table->string("property_state");
            $table->string("property_country");
            $table->string("property_latitude");
            $table->string("property_langitude");
            $table->integer("property_kitchens");
            $table->integer("property_bathrooms");
            $table->json("property_features");
            $table->string("property_contact_name");
            $table->string("property_contact_email");
            $table->string("property_contact_phone");
            $table->boolean("is_active")->default(1);
            $table->integer("ceated_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
