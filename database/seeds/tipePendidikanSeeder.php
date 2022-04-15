<?php
namespace Database\Seeds;
use Illuminate\Database\Seeder;

class tipePendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_pendidikan')->delete();
        $tipe_pendidikan = [
            ['nama_tipe' => 'SD'],
            ['nama_tipe' => 'SMP'],
            ['nama_tipe' => 'SMA'],
            ['nama_tipe' => 'S1'],
            ['nama_tipe' => 'S2'],
        ];
        DB::table('tipe_pendidikan')->insert($tipe_pendidikan);
    }
}
