<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('portfolio_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('architect');
            $table->string('client');
            $table->string('terms')->nullable();
            $table->string('project_type')->nullable();
            $table->string('strategy')->nullable();
            $table->date('project_date')->nullable();
            $table->string('thumbnail')->nullable(); // store image path
            $table->longText('details')->nullable(); // Summernote HTML
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('projects');
    }
};
