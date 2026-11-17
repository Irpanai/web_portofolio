<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_services', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_id')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_id')->nullable();
            $table->string('tag')->nullable();
            $table->string('year')->nullable();
            $table->string('authority')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_services');
    }
};
