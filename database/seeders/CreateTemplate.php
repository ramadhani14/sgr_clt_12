<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
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
                'nama'=>'Sagara Website',
                'email'=>'',
                'no_telp'=>'',
                'no_wa'=>'',
                'alamat'=>'',
                'kode_pos'=>'',
                'logo_besar'=>'image/global/logo_besar.png',
                'logo_kecil'=>'image/global/logo_kecil.png',
                'facebook'=>'',
                'twitter'=>'',
                'youtube'=>'',
                'instagram'=>'',
                'linkedin'=>'',
            ]
            ];

            foreach ($template as $key => $value) {
                Template::create($value);
            }

    }
}
