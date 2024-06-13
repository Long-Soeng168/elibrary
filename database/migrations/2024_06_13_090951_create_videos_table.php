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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('name_kh')->nullable();
            $table->integer('year')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('resolution')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords', 5000)->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('video_type_id')->nullable();
            $table->unsignedBigInteger('video_category_id')->nullable();
            $table->unsignedBigInteger('video_sub_category_id')->nullable();
            $table->unsignedBigInteger('create_by_user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
