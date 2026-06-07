<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /* Run the migrations.*/
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->text('description'); //string => 255 character max ; text for big texts
            $table->string('state');
            $table->timestamps();
        });
    }

    /* Reverse the migrations. this is not used often*/
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
