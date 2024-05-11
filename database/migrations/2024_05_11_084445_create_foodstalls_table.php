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
        Schema::create('foodstalls', function (Blueprint $table) {
            $table->id();
            $table->string('foodstall_name');
            $table->string('foodstall_location');
            $table->string('foodstall_desc');
            $table->string('foodstall_pict');
            $table->string('foodstall_contact');    
            $table->integer('foodstall_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodstalls');
    }
};
