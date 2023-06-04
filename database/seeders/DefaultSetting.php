<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;
class DefaultSetting extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('defaultsetting.defalut_setting');
        foreach ($data as $key => $value) {
            Config::create([
                'key' => $value['key'],
                'tengiatri' => $value['tengiatri'],
                'giatri' => $value['giatri'],
                'mota' => $value['mota'],
            ]);
        }
    }
}
