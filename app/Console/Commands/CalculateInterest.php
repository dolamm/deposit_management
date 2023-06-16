<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kyhan;
use App\Models\Sotietkiem;
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
                $thoigiannhanlai = $s->thongtinkyhan['thoigiannhanlai'];
                $giahan = $s->thongtinkyhan['giahan'];
                $ngayhientai->diffInDays($ngaymoso);
                $check = $ngayhientai->diffInDays($ngaymoso) % $thoigiannhanlai;
                if($check == 0){
                    $sotienlai = $s->sotiengui * $s->thongtinkyhan['laisuat'] * $s->thongtinkyhan['thoigiannhanlai'] / 365;
                    $s->sodu += $sotienlai;
                    $s->tienlai += $sotienlai;
                    $s->ngaydongso = $ngayhientai;
                }
                else if($check > 1){
                    $khongkyhan = Kyhan::where('makyhan', 'khongkyhan')->first();
                    $sotienlai = $s->sotiengui * $khongkyhan->laisuat * $khongkyhan->ngaytinhlai / 365;
                    $s->sodu += $sotienlai;
                    $s->tienlai += $sotienlai;
                }
                if($giahan == TRUE){
                    $s->ngaymoso = $ngayhientai;
                }
                $s->save();
            }
        }
    }
}
