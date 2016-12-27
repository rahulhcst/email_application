<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_thread', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('subject', 1024)->nullable();
            $table->boolean('inbox')->default(false);
            $table->boolean('sent')->default(false);
            $table->bigInteger('timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_thread');
    }
}
