<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->foreignId('mitra_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->integer('type')->default(0)->comment('0 free,1 premium');
            $table->string('price');
            $table->string('image');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
