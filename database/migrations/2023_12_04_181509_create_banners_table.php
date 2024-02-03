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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('ban_title',50)->nullable();
            $table->string('ban_subtitle',20)->nullable();
            $table->text('ban_detail')->nullable();
            $table->string('ban_btn',20)->nullable();
            $table->string('ban_pic',50)->nullable();
            $table->integer('ban_editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
