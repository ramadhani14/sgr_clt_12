<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'username'=>'admin',
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'jenis_kelamin'=>'p',
            'user_level'=>'1',
            'photo'=>'',
            'is_active'=>'1',
            'password'=>bcrypt('admin')
        ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
