<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    /**
     * Run the migrations.
     */
    Schema::create('submissions', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('abstract');
        $table->string('author_name');
        $table->string('author_email');
        $table->string('type')->default('article'); // article, photojournalism
        $table->string('status')->default('pending');
        $table->date('deadline');
        $table->string('qr_code')->nullable();
        $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('submissions'); }
};
