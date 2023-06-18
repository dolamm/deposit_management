<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kyhan;
use App\Models\Sotietkiem;
use App\Models\PassBookHistory;
use Carbon\Carbon;
class CalculateInterest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys:calculate-interest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'He thong tinh lai suat';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $kyhan = Kyhan::all();
        foreach($kyhan as $k){
            $sotietkiem = $k->ListPassbook()
            ->where('ngaydongso', null)
            ->get();
            foreach($sotietkiem as $s){
                $ngaymoso = Carbon::parse($s->ngaymoso);
                $ngayhientai = Carbon::now();

                $thongtinkyhan = json_decode($s->thongtinkyhan, true);
                $thoigiannhanlai = $thongtinkyhan['thoigiannhanlai'];

                $giahan = $thongtinkyhan['giahan'];
                $strtoend = $ngayhientai->diffInDays($ngaymoso);
                $check = $ngayhientai->diffInDays($ngaymoso) % $thoigiannhanlai;

                if($check == 0){
                    $sotienlai = $s->sodu * $thongtinkyhan['laisuat']/100 * $thongtinkyhan['thoigiannhanlai'] / 365;
                    PassBookHistory::create([
                        'sotietkiem_id' => $s->id,
                        'loaigd' => PassBookHistory::INTEREST,
                        'sotien' => $sotienlai,
                    ]);
                }
                else if($strtoend > $thoigiannhanlai){
                    $khongkyhan = Kyhan::find(1)->first();
                    $sotienlai = $s->sodu * $khongkyhan->laisuat/100 * $khongkyhan->ngaytinhlai / 365;
                    PassBookHistory::create([
                        'sotietkiem_id' => $s->id,
                        'loaigd' => PassBookHistory::INTEREST,
                        'sotien' => $sotienlai,
                    ]);
                }
                if($giahan == TRUE){
                    $s->ngaymoso = $ngayhientai;
                    $s->save();
                }
                
            }
        }
    }
}
