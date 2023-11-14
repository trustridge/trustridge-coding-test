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
        // 記事

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('status', 20);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 記事アイテム

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained();
            $table->string('item_type', 20);
            $table->boolean('is_draft');
            $table->unsignedInteger('order_num');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('heading_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->text('heading_text');
            $table->string('heading_type', 20);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('image_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->string('filename', 255);
            $table->string('alt_text', 60);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('text_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->text('text');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_items');
        Schema::dropIfExists('image_items');
        Schema::dropIfExists('heading_items');
        Schema::dropIfExists('items');
        Schema::dropIfExists('articles');
    }
};
