<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin123'),
                'roles' => 'kelurahan'
            ],
            [
                'name' => 'test',
                'email' => 'test@mail.com',
                'password' => bcrypt('test1234'),
                'roles' => 'rw'
            ]

            ];
            DB::table('users')->insert($data);
    }
}
