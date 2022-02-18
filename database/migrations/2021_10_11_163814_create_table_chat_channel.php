<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChatChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_channel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_channel_pusher_module_id')->comment('使用哪個Pusher帳號推送')
                ->index('index_chat_channel_pusher_module_id')->nullable();
            $table->string('chat_channel_key',255)
                ->comment('channel key 目前用兩人ID 由小到大做Md5 紀錄，可拿出來重複用不用重啟key，有先前對話紀錄')
                ->index('index_chat_channel_key');
            $table->integer('chat_start_user_id')->comment('第一個userID , 0為系統通知用')
                ->index('index_chat_start_user_id');
            $table->integer('chat_get_user_id')->comment('第二個userID')
                ->index('index_chat_get_user_id');
            $table->integer('chat_type')->comment('頻道類型 0.一般私人 1.系統通知 2.保留')->default(0);
            $table->integer('chat_status')->comment('是否開啟中 0 關閉 1. 啟動中')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        DB::statement("ALTER TABLE `chat_channel` comment '紀錄發起對話channel'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_channel');
    }
}
