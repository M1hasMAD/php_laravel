<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 'php artisan make:model Post -m' -> command to create migration file and model(-m) fileone
return new class extends Migration
{
    // method 'up' -> create the migration
    public function up(): void // like sql query in Java
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable(); // text bigger than string
            $table->string('image')->nullable(); // string bc we save image url and possible null
            $table->unsignedInteger('likes'); // only positive numbers
            $table->boolean('is_published')->default(1); // 1 = true, 0 = false
            $table->timestamps();

            $table->softDeletes(); // adding a column for soft delete(if column is filled with deletion time->model deleted)
            // 'php artisan migrate:refresh' -> refresh the migration (not cool way bc all data will be deleted)
            $table->index('category_id', 'post_category_idx');
            $table->foreignId('category_id')->nullable();
        });
    } // 'php artisan migrate' -> run migration


    // method 'down' -> rollback the migration
    public function down(): void
    {
        Schema::dropIfExists('posts');
    } // 'php artisan migrate:rollback' -> reverse(rollback) the migration
};
