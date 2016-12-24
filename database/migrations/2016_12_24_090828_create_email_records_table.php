<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_records', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('email_id');
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->bigInteger('parent_email_id')->nullable();
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
        Schema::dropIfExists('email_records');
    }
}
