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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('volume')->nullable();
            $table->integer('year')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['title', 'volume', 'year']);
            $table->index('title');
            $table->foreign('company_id')->references('id')->on('companies')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
