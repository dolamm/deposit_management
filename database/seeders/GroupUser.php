<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupUser as ModelsGroupUser;

class GroupUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('groupuser.role');
        foreach ($data as $item) {
            ModelsGroupUser::create($item);
        }
    }
}
