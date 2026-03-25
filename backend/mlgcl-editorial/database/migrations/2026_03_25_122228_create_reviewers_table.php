<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reviewers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('role'); // reviewer, editor, chief-editor
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('reviewers'); }
};
