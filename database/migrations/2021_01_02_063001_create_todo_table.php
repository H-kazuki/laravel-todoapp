<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 20);
            $table->text('content', 100)->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('todo');
    }
}
