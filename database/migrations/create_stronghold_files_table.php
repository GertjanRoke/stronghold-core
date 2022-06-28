<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up()
    {
        Schema::create('stronghold_files', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('filename');
            $table->string('path');

            $table->timestamps();
            $table->softDeletes();
        });
    }
};
