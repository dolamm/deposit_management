<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\SotietkiemFactory;
use App\Models\SoTietKiem;
class GenerateSotietkiem extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SoTietKiem::factory()->count(100)->create();
    }
}
