<?php

namespace App\Observers;

use App\Models\PassBookHistory;

class PassbookHSObserver
{
    /**
     * Handle the PassBookHistory "created" event.
     */
    public function created(PassBookHistory $passBookHistory): void
    {
        $loaihinh = $passBookHistory->loaihinh;
        $passBookHistory->soducu = $passBookHistory->sotietkiem->sodu;
        $sotietkiem = $passBookHistory->sotietkiem;
        switch($loaihinh){
            case PassBookHistory::DEPOSIT:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu + $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $passBookHistory->ghichu = "Gui tien";
                break;
            case PassBookHistory::WITHDRAW:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu - $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $passBookHistory->ghichu = "Rut tien";
                break;
            case PassBookHistory::INTEREST:
                $passBookHistory->sodumoi = $passBookHistory->sotietkiem->sodu  + $passBookHistory->sotien;
                $sotietkiem->sodu = $passBookHistory->sodumoi;
                $sotietkiem->tienlai += $passBookHistory->sotien;
                $passBookHistory->ghichu = "Lai suat ky han";
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
