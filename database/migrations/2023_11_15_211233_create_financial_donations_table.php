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
        Schema::create('financial_donations', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pengirim");
            $table->text("alamat_pengirim");
            $table->string("jumlah_donasi");
            $table->string("bukti_donasi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_donations');
    }
};
