<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->constrained('message_years')->cascadeOnDelete();
            $table->foreignId('series_id')->nullable()->constrained('series')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('message_categories')->nullOnDelete();
            $table->string('speaker');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('audio')->nullable();
            $table->string('video')->nullable();
            $table->string('notes')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('downloads')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
