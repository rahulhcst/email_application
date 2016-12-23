<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEmailMapper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_mapper', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('emailid');
            $table->bigInteger('senderid');
            $table->bigInteger('receiverid');
            $table->bigInteger('categoryid');
            $table->bigInteger('previous_id')->nullable();
            $table->bigInteger('next_id')->nullable();
            $table->bigInteger('reply_id')->nullable();
            $table->bigInteger('timestamp')->nullable();
            $table->boolean('is_read')->default(false);
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
        Schema::dropIfExists('email_mapper');
    }
}
