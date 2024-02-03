<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use carbon\carbon;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::insert([
            'ban_title'=>"Hello I'm Manilla UI & UX Designer",
            'ban_subtitle'=>'Hello',
            'ban_detail'=>'It is a long established fact that a reader will be distracted by the readable content',
            'ban_btn'=>'Hire Me',
            'ban_editor'=>1,
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
    }
}
