<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePusherModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pusher_module', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pusher_content')->comment('備註一下');
            $table->string('pusher_app_id',255)->comment('pusher_app_id');
            $table->string('pusher_key',255)->comment('pusher_key');
            $table->string('pusher_secret',255)->comment('pusher_secret');
            $table->string('pusher_cluster',255)->comment('pusher_cluster');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pusher_module');
    }
}
