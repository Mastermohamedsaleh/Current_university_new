<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;


use App\Models\Setting;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        
        DB::table('settings')->delete();
        $settings = [
            'unvirsty_name'=>'SmartAcademy',
            'phone'=>'19924',
            'address'=>'Cairo',
            'logo'=>'logo2.png',
            'email'=>'Academy@cis.edu.eg',
            'link_facebook'=>'https://facebook.com/unvirsty',
            'link_linked_in'=>'https://linked_in.com/unvirsty',
            'link_youtube'=>'https://youtube.com/unvirsty',
        ];     
            Setting::create($settings);
          
    }
}
