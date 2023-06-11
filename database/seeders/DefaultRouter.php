<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;
class DefaultRouter extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route = config('dynamicroute');
        foreach ($route as $key => $value) {
            Route::create($value);
        }
    }
}
