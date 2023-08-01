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
        Schema::create('package_assign_company', function (Blueprint $table) {
            $table->id("package_assign_company_id");
            $table->unsignedBigInteger('package_id'); // package_type
            $table->foreign('package_id')->references('package_id')->on('packages');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->integer("payment_cycle");
            $table->float("total_amount");
            $table->float("discount_value");
            $table->float("grand_amount");
            $table->datetime("assigned_at");
            $table->datetime("expiration_at");
            $table->boolean("package_activated");
            $table->boolean("carry_forward");
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
        Schema::dropIfExists('package_assign_company');
    }
};
