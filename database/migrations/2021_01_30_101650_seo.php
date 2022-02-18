<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('seo', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('code',100)->comment('類型');
        //     $table->string('text',1024)->comment('文字');
        //     $table->string('description',100)->comment('描述');
        //     $table->timestamp('create_time')->useCurrent();
        //     $table->timestamp('update_time')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('seo');
    }
}
