<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\DoanhSoFactory;
use App\Models\Kyhan;
use App\Models\BcDoanhSo as DoanhSo;
class BCDoanhSo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kyhan = Kyhan::all();
        foreach ($kyhan as $key => $value) {
            DoanhSo::factory()->count(40)->create([
                'makyhan' => $value->makyhan,
            ]);
        }
    }
}
