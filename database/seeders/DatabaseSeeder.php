<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserRole::class);
        $this->call(AdminUser::class);
        $this->call(GenerateUser::class);
        $this->call(DefaultPermission::class);
        $this->call(DefaultSetting::class);
        $this->call(AccountHS::class);
        $this->call(DefaultRouter::class);
        $this->call(KyHanMacDinh::class);
        $this->call(BCDoanhSo::class);
        $this->call(BCSLSo::class);
        $this->call(GenerateSotietkiem::class);
        $this->call(PassbookHS::class);
    }
}
