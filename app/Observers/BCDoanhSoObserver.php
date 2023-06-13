<?php

namespace App\Observers;

use App\Models\BcDoanhSo;

class BCDoanhSoObserver
{
    /**
     * Handle the BcDoanhSo "created" event.
     */
    public function created(BcDoanhSo $bcDoanhSo): void
    {
        // caculate chenhlech
        $bcDoanhSo->chenhlech = $bcDoanhSo->tongthu - $bcDoanhSo->tongchi;
        $bcDoanhSo->save();
    }

    /**
     * Handle the BcDoanhSo "updated" event.
     */
    public function updated(BcDoanhSo $bcDoanhSo): void
    {
        //
    }

    /**
     * Handle the BcDoanhSo "deleted" event.
     */
    public function deleted(BcDoanhSo $bcDoanhSo): void
    {
        //
    }

    /**
     * Handle the BcDoanhSo "restored" event.
     */
    public function restored(BcDoanhSo $bcDoanhSo): void
    {
        //
    }

    /**
     * Handle the BcDoanhSo "force deleted" event.
     */
    public function forceDeleted(BcDoanhSo $bcDoanhSo): void
    {
        //
    }
}
