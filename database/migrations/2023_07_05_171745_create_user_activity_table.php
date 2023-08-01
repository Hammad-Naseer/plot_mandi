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
        Schema::create('user_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('activity_json_data')->nullable();
            $table->text('user_agent_json')->nullable();
            $table->string('table', 50)->nullable();
            $table->string('action', 50);
            $table->text('message')->nullable();
            $table->string('action_id', 150)->nullable();
            $table->integer('log_type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity');
    }
};
