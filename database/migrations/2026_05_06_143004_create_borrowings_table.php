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
        Schema::create('borrowings', function (Blueprint $col) {
            $col->id();
            $col->foreignId('book_id')->constrained()->onDelete('cascade');
            $col->string('borrower_name');
            $col->date('borrowed_at');
            $col->date('returned_at')->nullable();
            $col->enum('status', ['borrowed', 'returned'])->default('borrowed');
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
