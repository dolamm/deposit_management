<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kyhan;
use App\Models\PassBookHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SotietkiemNotify;
use App\Models\Sotietkiem;
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

                $thongtinkyhan = $s->thongtinkyhan;
                $thoigiannhanlai = $thongtinkyhan['thoigiannhanlai'];

                $giahan = $thongtinkyhan['giahan'];
                $strtoend = $ngayhientai->diffInDays($ngaymoso);
                $check = $ngayhientai->diffInDays($ngaymoso) % $thoigiannhanlai;
                // // dung trong truong hop bi qua ngay dao han de tinh lai 0 ky han cho cac loai so
                // $ngaydaohan = $s->ngaydaohan;
                // $khongkyhan = Kyhan::find(1)->first();
                // $check = $ngayhientai->diffInDays($ngaydaohan) % $khongkyhan->ngaytinhlai;
                if($check >= 0){
                    $sotienlai = $s->sodu * $thongtinkyhan['laisuat'] /100  * $thongtinkyhan['thoigiannhanlai'] / 365;
                    PassBookHistory::create([
                        'sotietkiem_id' => $s->id,
                        'loaigd' => PassBookHistory::INTEREST,
                        'sotien' => $sotienlai,
                    ]);
                    if($giahan == TRUE && $s->cotherut()){
                        Notification::send($s->khachhang, new SotietkiemNotify($s, 'Bạn đã có thể từ sổ tiết kiệm #' . $s->id));
                    }
                    if($giahan == False && $s->trangthai() == Sotietkiem::STATUS[1]){
                        Notification::send($s->khachhang, new  SotietkiemNotify($s, 'Sổ tiết kiệm #' . $s->id . 'đã đến hạn'));
                    }
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
