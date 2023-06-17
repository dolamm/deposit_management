<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PassBookHistory;
class PassbookHS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PassBookHistory::factory()
            ->count(100)
            ->create();
    }
}
