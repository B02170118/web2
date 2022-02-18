<?php

namespace App\Console\Commands\Artisan\HotFix;


use App\Models\Entities\Modules\Pusher_Module;
use Illuminate\Console\Command;


class InsertChatSysConfig extends Command
{
    protected $signature = 'zHotFix:InsertChatSysConfig';

    protected $description = 'Roger version 2021-10-11';

    /**
     * Execute the console command.
     * @return bool
     * @author Roger 2021-10-11
     * php artisan zHotFix:InsertChatSysConfig
     */
    public function handle(): bool
    {

        $Pusher_Module = new Pusher_Module();
        $Pusher_Module->create([
            'pusher_content' => '',
            'pusher_app_id' => '',
            'pusher_key' => '',
            'pusher_secret' => '',
            'pusher_cluster' => '',
        ]);
        echo "done.";
        return true;
    }

}
