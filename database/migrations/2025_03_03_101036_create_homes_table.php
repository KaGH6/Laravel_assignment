<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('articleAbout');
            $table->longText('article');
            $table->json('tags'); //json形式＝JSの配列っぽいやつ。データは大体これで送られる。
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //記事にuser_idを持たせる
            $table->string('user_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('homes');
    }
};
