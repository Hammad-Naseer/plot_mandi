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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id('permission_id');
            $table->string("title", 100);
            $table->string("code", 100);
            $table->integer('type')->comment('1 = Auditee , 2 = Auditor');;
            $table->boolean('is_active')->default(true)->comment('0 = Inactive , 1 = Active');;
            $table->timestamps();
            $table->softDeletes();
            $table->integer("created_by");
            $table->integer("updated_by")->nullable();
            $table->integer("deleted_by")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
