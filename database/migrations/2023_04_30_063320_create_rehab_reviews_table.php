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
        Schema::create('rehab_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rehab_center')->unsigned()->nullable();
            $table->foreign('rehab_center')->references('id')->on('rehab_centers')->onDelete('cascade');
            $table->string('review_title')->nullable();
            $table->float('rating',10,1)->default(0);
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('comment',5000)->nullable();
            $table->Integer('admin_seen')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rehab_reviews');
    }
};
