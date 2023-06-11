<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountHistory;
use App\Models\User;
class AccountHS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::all();
        foreach ($user as $key => $value) {
            AccountHistory::factory()->count(20)->create([
                'account_number' => $value->phone,
            ]);
        }
    }
}
