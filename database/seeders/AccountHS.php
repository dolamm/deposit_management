<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountHistory;
class AccountHS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountHistory::factory()->count(20)->create();
    }
}
