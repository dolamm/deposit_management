<?php

namespace App\Observers;

use App\Models\PassBookHistory;
use Carbon\Carbon;

class PassbookHSObserver
{
    /**
     * Handle the PassBookHistory "created" event.
     */
    public function created(PassBookHistory $passBookHistory): void
    {
        $loaigd = $passBookHistory->loaigd;
        $passBookHistory->soducu = $passBookHistory->sotietkiem->sodu;
        $sotietkiem = $passBookHistory->sotietkiem;
        switch($loaigd){
            case PassBookHistory::DEPOSIT:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu + $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $passBookHistory->ghichu = "Gửi tiền";
                break;
            case PassBookHistory::WITHDRAW:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu - $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $passBookHistory->ghichu = "Rút tiền";
                if($passBookHistory->sodumoi <= 0){
                    $sotietkiem->ngaydongso = Carbon::now();
                }
                break;
            case PassBookHistory::INTEREST:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu  + $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $sotietkiem->tienlai += $passBookHistory->sotien;
                $passBookHistory->ghichu = "Tiền lãi";
                break;
        }
        $sotietkiem->save();
        $passBookHistory->save();
    }

    /**
     * Handle the PassBookHistory "updated" event.
     */
    public function updated(PassBookHistory $passBookHistory): void
    {
        //
    }

    /**
     * Handle the PassBookHistory "deleted" event.
     */
    public function deleted(PassBookHistory $passBookHistory): void
    {
        //
    }

    /**
     * Handle the PassBookHistory "restored" event.
     */
    public function restored(PassBookHistory $passBookHistory): void
    {
        //
    }

    /**
     * Handle the PassBookHistory "force deleted" event.
     */
    public function forceDeleted(PassBookHistory $passBookHistory): void
    {
        //
    }
}
