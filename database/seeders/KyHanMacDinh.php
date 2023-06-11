<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KyHan;
class KyHanMacDinh extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dskyhan = config('kyhanmacdinh');
        foreach ($dskyhan as $key => $value) {
            KyHan::create($value);
        }
    }
}
