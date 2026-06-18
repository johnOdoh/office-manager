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
            $table->foreignId('sender_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('recipient_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file');
            $table->string('approved_file')->nullable();
            $table->string('type');
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('additional_note')->nullable();
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
