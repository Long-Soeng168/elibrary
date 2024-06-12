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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('name_kh')->nullable();
            $table->string('isbn')->nullable();
            $table->integer('year')->nullable();
            $table->integer('pages_count')->nullable();
            $table->integer('edition')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('pdf')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('publication_type_id')->nullable();
            $table->unsignedBigInteger('publication_category_id')->nullable();
            $table->unsignedBigInteger('publication_sub_category_id')->nullable();
            $table->unsignedBigInteger('create_by_user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
