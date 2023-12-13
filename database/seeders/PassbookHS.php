<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PassBookHistory;
use App\Models\Sotietkiem;
use Carbon\Carbon;
use App\Console\Commands\CalculateInterest;
use Illuminate\Support\Facades\Artisan;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassbookHS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('sys:calculate-interest');
        $all = Sotietkiem::all();
        foreach ($all as $so) {
            $id = $so->id;
            $ngaydaohan = $so->ngaydaohan;
            $current = Carbon::now();
            $diffDay = $current->diffInDays($ngaydaohan);
            $thongtinkyhan = $so->thongtinkyhan;
            $kyhan_id = $thongtinkyhan['id'];
            $types = ['deposit', 'withdraw', 'interest'];

            $sodu = $so->sodu;
            $type = $types[random_int(0, 2)];
            $money = random_int(100000, 1000000000);
            if ($type == 'withdraw') {
                $money = random_int(0, $sodu);
            }
            for ($i = 0; $i < 1; ++$i) {
                if ($kyhan_id != 1 && $diffDay >= 0){
                    if($type == 'deposit' || $type == 'interest'){
                        $newPassbook = Sotietkiem::factory()->create([
                            'makyhan' => $so->makyhan,
                            'thongtinkyhan' => $so->thongtinkyhan,
                            'user_id' => $so->user_id,
                            'sodu' => $sodu + $money,
                        ]);
                    }
                    else {
                        PassBookHistory::create([
                            'sotietkiem_id' => $id,
                            'loaigd' => $type,
                            'sotien' => $sodu,
                            'ghichu' => $type
                        ]);
                    }
                } 
                else {
                    PassBookHistory::create([
                        'sotietkiem_id' => $id,
                        'loaigd' => $type,
                        'sotien' => $money,
                        'ghichu' => $type
                    ]);
                }
            }
        }
    }
}
