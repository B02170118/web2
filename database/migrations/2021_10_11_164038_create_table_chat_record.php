<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChatRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_channel_id')->comment('對話頻道ID')->index('index_chat_channel_id');
            $table->integer('chat_user_id')->comment('這一則訊息發話人ID')->index('index_chat_user_id');
            $table->text('chat_message')->comment('訊息');
            $table->timestamp('chat_send_time')->comment('這一則訊息發送時間');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        DB::statement("ALTER TABLE `chat_record` comment '對話紀錄'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_record');
    }
}
