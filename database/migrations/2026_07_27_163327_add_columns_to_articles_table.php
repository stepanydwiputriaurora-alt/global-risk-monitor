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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('slug')->unique()->after('title');
            $table->text('content')->nullable()->after('slug');
            $table->string('author')->nullable()->after('content');
            $table->string('image')->nullable()->after('author');
            $table->enum('status', ['draft', 'published'])->default('draft')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['title', 'slug', 'content', 'author', 'image', 'status']);
        });
    }
};
