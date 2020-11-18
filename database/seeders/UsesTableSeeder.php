<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'id' => '1',
            'name_family' => '川端',
            'name_first' => '莉緒',
            'email' => 'kawabata_rio@example.com',
            'password' => 'kotorisan'
            ],
            [
            'id' => '2',
            'name_family' => '児玉',
            'name_first' => '孝弘',
            'email' => 'kodama_takahiro@example.com',
            'password' => 'kotorisan'
            ],
            [
            'id' => '3',
            'name_family' => '岩井',
            'name_first' => '啓',
            'email' => 'iwai_kei@example.com',
            'password' => 'kotorisan'
            ],
        ]);
    }
}
