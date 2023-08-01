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
        Schema::create('role_companies', function (Blueprint $table) {
            $table->id("role_company_id");
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('location_id')->on('locations');
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
        Schema::dropIfExists('role_companies');
    }
};
