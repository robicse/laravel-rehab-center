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
        Schema::create('rehab_centers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('rehab_name')->unique();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->string('slug')->unique();
            $table->string('zip_code')->nullable();
            $table->string('state_name')->nullable();
            $table->string('country_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address',500)->nullable();
            $table->string('fax_number')->nullable();
            $table->string('email_address')->default(0);
            $table->string('map_lat')->nullable();
            $table->string('map_lng')->nullable();
            $table->json('facilities')->nullable();
            $table->string('youtube',350)->nullable();
            $table->string('twitter',350)->nullable();
            $table->string('pinterest',350)->nullable();
            $table->string('website',350)->nullable();
            $table->string('facebook',350)->nullable();
            $table->string('meta_description',500)->nullable();
            $table->string('json_screma',5000)->nullable();
            $table->string('meta_title',350)->nullable();
            $table->string('short_description',500)->nullable();
            $table->longText('description')->nullable();
            $table->string('image',500)->default('default.png');
            $table->json('insurance_accepts')->nullable();
            $table->Integer('admin_seen')->default(0);
            $table->Integer('view')->default(0);
            $table->float('rating',10,1)->default(0);
            $table->bigInteger('created_by_user_id')->default(1);
            $table->bigInteger('updated_by_user_id')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rehab_centers');
    }
};
