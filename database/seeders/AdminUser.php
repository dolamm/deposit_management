<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdminInfo = config('administrator');
        if($AdminInfo != null ){
            User::firstOrCreate([
                'fullname' => config('administrator.fullname'),
                'email' => config('administrator.email'),
                'password' => bcrypt(config('administrator.password')),
                'role_id' => config('administrator.role'),
                'cmnd_cccd' => config('administrator.cmnd_cccd'),
                'phone' => config('administrator.phone'),
            ]);
        }
    }
}
