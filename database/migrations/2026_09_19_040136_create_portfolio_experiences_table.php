<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('role_en');
            $table->string('role_id')->nullable();
            $table->string('company');
            $table->string('duration');
            $table->text('description_en')->nullable();
            $table->text('description_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_experiences');
    }
};
