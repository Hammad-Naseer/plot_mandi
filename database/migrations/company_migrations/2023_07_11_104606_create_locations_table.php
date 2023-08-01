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
        Schema::create('locations', function (Blueprint $table) {
            $table->id("location_id");
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->string("location_title");
            $table->string("location_phone");
            $table->string("location_address");
            $table->boolean("is_active")->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer("created_by");
            $table->integer("updated_by")->default(0);
            $table->integer("deleted_by")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
