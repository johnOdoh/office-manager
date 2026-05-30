<?php

use App\Enums\DocumentStatus;
use App\Enums\Priority;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender')->constrained('users')->cascadeOnDelete();
            $table->foreignId('recipient')->constrained('users')->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->string('file');
            $table->string('type');
            $table->enum('priority', Priority::toArray())->default(Priority::Low->value);
            $table->enum('status', DocumentStatus::toArray())->default(DocumentStatus::Pending->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
