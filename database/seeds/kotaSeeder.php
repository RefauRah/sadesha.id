<?php
namespace Database\Seeds;
use Illuminate\Database\Seeder;

class kotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('kota')->delete();

        $kota = [
            ['nama_kota' => 'Kabupaten Bogor'],
            ['nama_kota' => 'Kabupaten Sukabumi'],
            ['nama_kota' => 'Kabupaten Cianjur'],
            ['nama_kota' => 'Kabupaten Bandung'],
            ['nama_kota' => 'Kabupaten Bandung Barat'],
            ['nama_kota' => 'Kabupaten Garut'],
            ['nama_kota' => 'Kabupaten Tasikmalaya'],
            ['nama_kota' => 'Kabupaten Ciamis'],
            ['nama_kota' => 'Kabupaten Kuningan'],
            ['nama_kota' => 'Kabupaten Cirebon'],
            ['nama_kota' => 'Kabupaten Majalengka'],
            ['nama_kota' => 'Kabupaten Sumedang'],
            ['nama_kota' => 'Kabupaten Indramayu'],
            ['nama_kota' => 'Kabupaten Subang'],
            ['nama_kota' => 'Kabupaten Purwakarta'],
            ['nama_kota' => 'Kabupaten Karawang'],
            ['nama_kota' => 'Kabupaten Bekasi'],
            ['nama_kota' => 'Kabupaten Pangandaran'],
            ['nama_kota' => 'Kota Bogor'],
            ['nama_kota' => 'Kota Sukabumi'],
            ['nama_kota' => 'Kota Bandung'],
            ['nama_kota' => 'Kota Cirebon'],
            ['nama_kota' => 'Kota Bekasi'],
            ['nama_kota' => 'Kota Depok'],
            ['nama_kota' => 'Kota Cimahi'],
            ['nama_kota' => 'Kota Tasikmalaya'],
            ['nama_kota' => 'Kota Banjar'],
        ];
        DB::table('kota')->insert($kota);
    }
}
