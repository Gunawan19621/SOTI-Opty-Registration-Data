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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('sales_name');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_company_name');
            $table->string('company_address')->nullable(); //
            $table->string('company_industry');
            $table->string('deployment');
            $table->string('os_tipe');
            $table->integer('jumlah_lisensi');
            $table->string('mdm_competitor');
            $table->date('poc_date');
            $table->string('budget_license');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
