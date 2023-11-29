<?php

namespace App\Observers;

use App\Models\BcSoLuongSo;

class BcSLSoObserver
{
    /**
     * Handle the BcSoLuongSo "created" event.
     */
    public function created(BcSoLuongSo $bcSoLuongSo): void
    {
        // update chenh lech
        $bcSoLuongSo->chenhlech = $bcSoLuongSo->sl_somoi - $bcSoLuongSo->sl_sodong;
        $bcSoLuongSo->save();
    }

    /**
     * Handle the BcSoLuongSo "updated" event.
     */
    public function updated(BcSoLuongSo $bcSoLuongSo): void
    {
        //
    }

    /**
     * Handle the BcSoLuongSo "deleted" event.
     */
    public function deleted(BcSoLuongSo $bcSoLuongSo): void
    {
        //
    }

    /**
     * Handle the BcSoLuongSo "restored" event.
     */
    public function restored(BcSoLuongSo $bcSoLuongSo): void
    {
        //
    }

    /**
     * Handle the BcSoLuongSo "force deleted" event.
     */
    public function forceDeleted(BcSoLuongSo $bcSoLuongSo): void
    {
        //
    }
}
