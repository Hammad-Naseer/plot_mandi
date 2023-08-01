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
        Schema::create('package_payment_details', function (Blueprint $table) {
            $table->id("package_payment_detail_id");
            $table->unsignedBigInteger('package_assign_company_id');
            $table->foreign('package_assign_company_id')->references('package_assign_company_id')->on('package_assign_company');
            $table->float("due_amount");
            $table->float("paid_amount")->nullable();
            $table->boolean("payment_status")->default(0);
            $table->string("payment_details")->nullable();
            $table->datetime("recieved_at")->nullable();
            $table->integer("recieved_by")->default(0);
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
        Schema::dropIfExists('package_payment_details');
    }
};
