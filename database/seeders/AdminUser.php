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
                'role' => config('administrator.role'),
                'CMND/CCCD' => config('administrator.CMND/CCCD'),
                'phone' => config('administrator.phone'),
            ]);
        }
    }
}
