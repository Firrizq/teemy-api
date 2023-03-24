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
        Schema::create('comments', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('teem_id');
            $table->text('comment');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade')->nullable();
            $table->foreign('teem_id')->references('id')->on('teems');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

        // $table->id();
        // $table->unsignedBigInteger('teem_id');
        // $table->unsignedBigInteger('user_id');
        // $table->text('comment_content');
        // $table->timestamps();
    
        // $table->softDeletes();
        // $table->foreign('user_id')->references('id')->on('users');
        // $table->foreign('teem_id')->references('id')->on('teems');