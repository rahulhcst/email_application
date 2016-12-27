<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('email_record', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('mailid');
            $table->bigInteger('senderid');
            $table->bigInteger('receiverid')->nullable();
            $table->bigInteger('previous')->nullable();
            $table->bigInteger('next')->nullable();
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
        Schema::dropIfExists('email_record');
    }
}
