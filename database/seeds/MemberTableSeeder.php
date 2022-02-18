<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Member\Member;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // DB::table('member')->truncate();//清空資料表
        // Member::unguard();//禁用禁止批量附值
        // factory(Member::class,1)->create();
        // Member::reguard();//啟用禁止批量附值
    }
}
