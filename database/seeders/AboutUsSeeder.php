<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutUs;
use carbon\carbon;
use Auth;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::insert([
            'abo_title'=>'Failure Is The Condiment That Gives Success',
            'abo_subtitle'=>'About Us',
            'abo_detail'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consectetur ut lorem vitae ultricies. Integer porta, libero sit amet pretium lobortis, tortor mauris eleifend urna, ut laoreet velit nisi scelerisque ex. Fusce vel pulvinar ligula. Etiam eget dolor leo. Phasellus eu dolor cursus, sodales nunc at, tempor turpis',
            'abo_btn'=>'Download CV',
            'abo_editor'=>1,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }
}
