<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Nationalitie;

use Illuminate\Support\Facades\DB;


class NationalitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();
        $nationalities = [
            ['nationalitie' => 'Egyption'],
            ['nationalitie' => 'Sudie Arab'],
        ];
        foreach ($nationalities as $nationalitie) {
            Nationalitie::create($nationalitie);
        }
    }
}
