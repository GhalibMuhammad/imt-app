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
        Schema::create('imts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("siswa_id");
            $table->bigInteger("food_id");
            $table->bigInteger("sport_id");
            $table->float("tb");
            $table->float("bb");
            $table->string("imt_category");
            $table->enum('jk',['pria','wanita']);
            $table->float("imt_results");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imts');
    }
};
