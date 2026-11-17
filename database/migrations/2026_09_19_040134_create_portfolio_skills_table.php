<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_skills', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_id');
            $table->text('description_en')->nullable();
            $table->text('description_id')->nullable();
            $table->text('icon')->nullable();
            $table->text('items_en')->nullable();
            $table->text('items_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_skills');
    }
};
