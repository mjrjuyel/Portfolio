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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('cm_name',20)->nullable();
            $table->string('cm_email',20)->nullable();
            $table->string('cm_subject',20)->nullable();
            $table->string('cm_phone',20)->nullable();
            $table->text('cm_text')->nullable();
            $table->string('cm_slug',20)->nullable();
            $table->integer('cm_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
