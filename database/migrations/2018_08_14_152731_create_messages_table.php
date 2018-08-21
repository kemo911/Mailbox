<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Message;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Messages', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('sender','100');
            $table->string('subject','100');
            $table->text('message');
            $table->string('time_sent',20);
            $table->tinyInteger('archived')->default('0');
            $table->tinyInteger('read')->default('0');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Messages');
    }
}
