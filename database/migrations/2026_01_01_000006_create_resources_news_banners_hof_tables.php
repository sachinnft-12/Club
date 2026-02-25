<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('resource_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['youtube', 'affiliate', 'guide'])->default('guide');
            $table->string('url');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('news_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', ['tournament', 'event', 'world_result', 'club_opening', 'general'])->default('general');
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->string('target_url')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Schema::create('hall_of_fame_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country')->default('India');
            $table->string('achievement');
            $table->unsignedInteger('rank_position')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hall_of_fame_entries');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('news_events');
        Schema::dropIfExists('resource_links');
    }
};
