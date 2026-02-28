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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // kapcsolat a users táblához
            $table->foreignId('category_id')->constrained('job_categories')->cascadeOnDelete(); // kapcsolat a job_categories táblához
            $table->string('title'); // állás megnevezése
            $table->string('local'); // helyszín
            $table->text('description'); // állás leírása
            $table->enum('type', ['full-time', 'part-time', 'remote' ]); // állás típusa
            $table->enum('status', ['active', 'passive'])->default('active'); // állás státusza
            $table->unsignedBigInteger('salary')->nullable(); // fizetés (opcionális)
            $table->date('valid_from'); // érvényesség kezdete
            $table->date('valid_to'); // érvényesség vége
            $table->string('slug'); // SEO-barát URL slug
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
