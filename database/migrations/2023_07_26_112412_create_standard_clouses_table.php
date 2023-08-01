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
        Schema::create('standard_clouses', function (Blueprint $table) {
            $table->id("standard_clouse_id");
            $table->unsignedBigInteger('standard_requirement_id');
            $table->foreign('standard_requirement_id')->references('standard_requirement_id')->on('standard_requirements');
            $table->unsignedBigInteger('standard_id');
            $table->foreign('standard_id')->references('standard_id')->on('standards');
            $table->string("clouse_title");
            $table->string("clouse_number");
            $table->string("clouse_hierarchy")->nullable();
            $table->integer("clouse_parent")->default(0);
            $table->boolean("is_mandatory")->default(0);
            $table->integer("milestone")->default(0);
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
        Schema::dropIfExists('standard_clouses');
    }
};
