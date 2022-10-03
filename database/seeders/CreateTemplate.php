<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\MstKomoditas;
use Carbon\Carbon;

class CreateTemplate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = [
            [
                'nama'=>'Inovasi Desa',
                'email'=>'inovasidesa@desa.com',
                'no_telp'=>'02122074',
                'no_wa'=>'082169761759',
                'alamat'=>'Jl Raya Pabean Udik No. 1 Kecamatan Indramayu Kabupaten Indramayu',
                'kode_pos'=>'45219',
                'logo_besar'=>'image/global/logo_besar.png',
                'logo_kecil'=>'image/global/logo_kecil.png',
                'facebook'=>'https://web.facebook.com/?_rdc=1&_rdr',
                'twitter'=>'https://twitter.com/',
                'youtube'=>'https://www.youtube.com/',
                'instagram'=>'https://www.instagram.com/',
                'linkedin'=>'',
            ]
            ];

            $mst_komoditas = [
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Alat',
                    'komoditas'=>'alat',
                    'singkatan'=>'jnsalat',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Hortikultura',
                    'komoditas'=>'hortikultura',
                    'singkatan'=>'jnshortikultura',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Kehutanan',
                    'komoditas'=>'kehutanan',
                    'singkatan'=>'jnskehutanan',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Penggunaan',
                    'komoditas'=>'penggunaan',
                    'singkatan'=>'jnspenggunaan',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Tanaman Pangan',
                    'komoditas'=>'tanamanpangan',
                    'singkatan'=>'jnstanamanpangan',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Hewan Ternak',
                    'komoditas'=>'hewanternak',
                    'singkatan'=>'jnshewanternak',
                    'status_master'=>1,
                    'status_jenis'=>1
                ],
                [
                    'created_by'=>1,
                    'updated_by'=>1,
                    'judul'=>'Ikan Laut',
                    'komoditas'=>'ikanlaut',
                    'singkatan'=>'jnsikanlaut',
                    'status_master'=>1,
                    'status_jenis'=>0
                ]
            ];

            foreach ($template as $key => $value) {
                Template::create($value);
            }

            foreach ($mst_komoditas as $key => $value) {
                MstKomoditas::create($value);
            }
    }
}
