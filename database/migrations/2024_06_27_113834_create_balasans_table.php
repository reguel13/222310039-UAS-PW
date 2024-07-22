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
        Schema::create('balasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tiket')->constrained('tikets')->onDelete('cascade');
            $table->text('balasan');
            $table->string('email_pengirim', 100);
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balasans');
    }
};
