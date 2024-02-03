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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('abo_title',50)->nullable();
            $table->string('abo_subtitle',20)->nullable();
            $table->text('abo_detail')->nullable();
            $table->string('abo_btn',20)->nullable(); 
            $table->string('abo_pic',50)->nullable();
            $table->integer('abo_editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
