<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description'); // HTML from Summernote
            $table->unsignedBigInteger('category_id');
            $table->string('thumbnail')->nullable();
            $table->string('tags')->nullable(); // comma-separated tags
            $table->boolean('is_published')->default(false); // published/unpublished
            $table->date('publish_date')->nullable(); // optional publish date
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
