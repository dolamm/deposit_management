<?php

namespace App\Observers;

use App\Models\Kyhan;
use App\Models\LsKyhan;
class KyhanObserver
{
    /**
     * Handle the Kyhan "created" event.
     */
    public function created(Kyhan $kyhan): void
    {
        // update lai suat
        $lsKyhan = new LsKyhan();
        $lsKyhan->kyhan_id = $kyhan->id;
        $lsKyhan->laisuatcu = 0;
        $lsKyhan->laisuatmoi = $kyhan->laisuat;
        $lsKyhan->save();
    }

    /**
     * Handle the Kyhan "updated" event.
     */
    public function updated(Kyhan $kyhan): void
    {
        $lsKyhan = new LsKyhan();
        $lsKyhan->kyhan_id = $kyhan->id;
        $lsKyhan->laisuatcu = $kyhan->getOriginal('laisuat');
        $lsKyhan->laisuatmoi = $kyhan->laisuat;
        $lsKyhan->save();
    }

    /**
     * Handle the Kyhan "deleted" event.
     */
    public function deleted(Kyhan $kyhan): void
    {
        //
    }

    /**
     * Handle the Kyhan "restored" event.
     */
    public function restored(Kyhan $kyhan): void
    {
        //
    }

    /**
     * Handle the Kyhan "force deleted" event.
     */
    public function forceDeleted(Kyhan $kyhan): void
    {
        //
    }
}
