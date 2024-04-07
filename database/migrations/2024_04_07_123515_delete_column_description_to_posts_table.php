<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//'php artisan make:migration delete_column_description_to_posts_table'->create migration for delete column 'description' in table Posts
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // apply the migration(delete column) удаляем
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // rollback the migration(restore column) отменяем удаление
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('description')->nullable()
            ->after('content');
        });
    }
};
