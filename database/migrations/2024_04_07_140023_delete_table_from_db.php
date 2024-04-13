<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//' php artisan make:migration delete_table_from_db'->create migration for delete table from db
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            Schema::dropIfExists('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('post_content');
            $table->string('image')->nullable();
            $table->unsignedInteger('likes');
            $table->boolean('is_published')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};