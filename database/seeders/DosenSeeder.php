<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([[
            'nama' => 'Zarkasi',
            'nidn' => '1234567890',
            'tanggal_lahir' => '1998-11-09'
        ], [
            'nama' => 'Anang',
            'nidn' => '0987654321',
            'tanggal_lahir' => '1970-07-24'
        ]]);
    }
}
