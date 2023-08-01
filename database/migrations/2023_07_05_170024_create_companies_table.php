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
        Schema::create('companies', function (Blueprint $table) {
            $table->id("company_id");
            $table->string('company_name', 200);
            $table->string('company_website', 100)->nullable();
            $table->string('company_phone', 50)->nullable();
            $table->string('company_email', 100)->unique();
            $table->text('company_address')->nullable();
            $table->string('company_type', 100)->nullable();
            $table->string('company_abbreviation', 100);
            $table->string('location_code', 100);
            $table->string('location_type', 100);
            $table->string('secret_key', 200)->unique();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('company_logo', 100)->nullable();
            $table->string('company_fevicon', 100)->nullable();
            $table->string('company_letterhead_header', 100)->nullable();
            $table->string('company_letterhead_footer', 100)->nullable();
            $table->integer('auth_type');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->integer('deleted_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
