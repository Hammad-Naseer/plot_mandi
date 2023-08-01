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
        Schema::create('standard_requirements', function (Blueprint $table) {
            $table->id("standard_requirement_id");
            $table->unsignedBigInteger('standard_id');
            $table->foreign('standard_id')->references('standard_id')->on('standards');
            $table->string("requirement_title");
            $table->boolean("is_active")->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->integer("created_by");
            $table->integer("updated_by")->default(0);
            $table->integer('deleted_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_requirements');
    }
};
