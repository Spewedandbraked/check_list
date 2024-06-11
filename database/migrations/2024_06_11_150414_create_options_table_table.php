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
        Schema::disableForeignKeyConstraints();

        Schema::create('options_table', function (Blueprint $table) {
            $table->id()->foreign('answers.option_id');

            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')->references('id')->on('lists');
            $table->string('content');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_table');
    }
};
