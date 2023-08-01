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
        Schema::create('users', function (Blueprint $table) {
            $table->id("user_id");
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('auth_type')->default(0);
            $table->boolean('two_factor_enabled')->default(false)->nullable();
            $table->boolean('two_factor_disabled_access')->default(false)->nullable();
            $table->integer('admin_type')->default(0);
            $table->rememberToken();
            $table->boolean('is_active')->default(false);
            $table->datetime('link_expire_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
