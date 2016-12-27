<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('userid');
            $table->bigInteger('timestamp');
            $table->string('subject', 255)->nullable();
            $table->string('body', 8191)->nullable();
            $table->boolean('attachement')->default(false);
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
