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
        Schema::create('seni_taris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('asal');
            $table->text('description');
            $table->string('judul');
            $table->text('buatan');
            $table->string('pencipta');
            $table->string('pelaku');
            $table->integer('rating');
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
        Schema::dropIfExists('seni_taris');
    }
};
