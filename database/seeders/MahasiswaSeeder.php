<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([[
            'nama' => 'Athar',
            'nim' => '232410102064',
            'tanggal_lahir' => '2004-11-09'
        ], [
            'nama' => 'Lutfi',
            'nim' => '232410102035',
            'tanggal_lahir' => '2003-07-24'
        ]]);

        $this->updateIdDpa('232410102018');
    }

    private function checkMahasiswaByNim($nim)
    {
        $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();

        if ($mahasiswa) {
            echo 'Mahasiswa dengan NIM ' . $nim . ' bernama = ' . $mahasiswa->nama;
        }
    }

    private function updateTanggalLahir($nim)
    {
        $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->update([
            'tanggal_lahir' => '2005-07-27'
        ]);
    }

    private function deleteMahasiswa($nim)
    {
        $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->delete();
    }
}
