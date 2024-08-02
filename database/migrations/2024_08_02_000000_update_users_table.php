<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
Schema::table('users', function (Blueprint $table) {
    $table->foreignId('product_id')->nullable();
});