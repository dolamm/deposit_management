<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccountHistory;
use App\Models\User;
use Carbon\Carbon;
class AccountHS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::all();
        foreach ($user as $key => $value) {
            $date = Carbon::now()->subMonths(6);
            for ($i=0; $i < 50; $i++) {
                AccountHistory::factory()->create([
                    'account_number' => $value->phone,
                    'type' => AccountHistory::TYPE_DEPOSIT,
                    'created_at' => $date->addDays(1),
                ]);
                AccountHistory::factory()->create([
                    'account_number' => $value->phone,
                    'type' => AccountHistory::TYPE_WITHDRAW,
                    'created_at' => $date->addDays(1),
                ]);
            }
        }
    }
}
