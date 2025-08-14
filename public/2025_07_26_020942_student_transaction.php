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
        // Tagihan siswa (SPP, buku, dll)
        Schema::create('student_bills', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('student_id');
            $table->string('type'); // spp, buku, seragam, dll
            $table->decimal('amount', 12, 2);
            $table->string('description')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });

        // Pembayaran siswa (bisa cicilan)
        Schema::create('student_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('bill_id');
            $table->decimal('paid_amount', 12, 2);
            $table->date('payment_date');
            $table->string('method')->nullable(); // cash, transfer, dll
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('student_bills')->onDelete('cascade');
        });

        // Pembelian buku siswa (jika ingin dicatat detail per buku)
        Schema::create('student_books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('student_id');
            $table->string('book_name');
            $table->decimal('amount', 12, 2);
            $table->date('purchase_date');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_books');
        Schema::dropIfExists('student_payments');
        Schema::dropIfExists('student_bills');
    }
};
