<?php

use App\Models\User;
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
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete(); // Laravel-ის migration helper-ია, რომელიც ავტომატურად ქმნის foreign key სვეტს კონკრეტული Model-ისთვის.
            // ქმნის user_id სვეტს
            //მნის foreign key-ს users(id)-ზე
            //თუ მომხმარებელი წაიშლება, მისი დაკავშირებული ჩანაწერებიც ავტომატურად წაიშლება
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
