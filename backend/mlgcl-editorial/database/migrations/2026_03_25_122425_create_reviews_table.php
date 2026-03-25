<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained();
            $table->foreignId('reviewer_id')->constrained();
            $table->text('feedback');
            $table->string('recommendation'); // accept, revise, reject
            $table->date('due_date');
            $table->date('completed_at')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('reviews'); }
};