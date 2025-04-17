<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('stub')->nullable();
            $table->longText('body')->nullable();
            $table->json('tags')->nullable();
            $table->string('cover_image')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->json('meta')->nullable();
            $table->unsignedInteger('reading_time')->nullable();
            $table->timestamp('published_at')->index()->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
