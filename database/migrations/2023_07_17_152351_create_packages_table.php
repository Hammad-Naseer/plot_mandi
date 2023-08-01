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
        Schema::create('packages', function (Blueprint $table) {
            $table->id("package_id");
            $table->string("package_title");
            $table->string("package_description")->nullable();
            $table->integer("package_for");
            $table->integer("currency");
            $table->float("plan_price");
            $table->integer("max_locations");
            $table->integer("max_users");
            $table->integer("max_users_per_location");
            $table->integer("maximum_standards");
            $table->integer("on_board_auditors")->default(0);
            $table->integer("data_retention_period")->default(0);
            $table->integer("storage");
            $table->json("features");
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
        Schema::dropIfExists('packages');
    }
};
