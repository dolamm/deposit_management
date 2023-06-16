<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kyhan;
use App\Models\BcSoLuongSo;
class BcSLSo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kyhan = Kyhan::all();
        foreach ($kyhan as $k){
            BcSoLuongSo::factory()->count(20)->create([
                'makyhan' => $k->makyhan,
            ]);
        }
    }
}
