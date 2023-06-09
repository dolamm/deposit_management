<?php

namespace App\Observers;

use App\Models\Sotietkiem;
use Carbon\Carbon;
use App\Models\PassBookHistory;
class SotietkiemObserver
{
    /**
     * Handle the Sotietkiem "created" event.
     */
    public function created(Sotietkiem $sotietkiem): void
    {
        $thongtinkyhan = $sotietkiem->kyhan;
        $sotietkiem->thongtinkyhan = $thongtinkyhan;
        $sotietkiem->ngaydaohan = Carbon::parse($sotietkiem->ngaymoso)->addDays($thongtinkyhan->thoigiannhanlai);
        $sotietkiem->ngaycapnhat = $sotietkiem->ngaymoso;
        $sotietkiem->save();

        PassBookHistory::create([
            'sotietkiem_id' => $sotietkiem->id,
            'loaigd' => PassBookHistory::DEPOSIT,
            'sotien' => $sotietkiem->sotiengui,
            'ngaygiaodich' => $sotietkiem->ngaymoso,
        ]);
    }

    /**
     * Handle the Sotietkiem "updated" event.
     */
    public function updated(Sotietkiem $sotietkiem): void
    {
    }

    /**
     * Handle the Sotietkiem "deleted" event.
     */
    public function deleted(Sotietkiem $sotietkiem): void
    {
        //
    }

    /**
     * Handle the Sotietkiem "restored" event.
     */
    public function restored(Sotietkiem $sotietkiem): void
    {
        //
    }

    /**
     * Handle the Sotietkiem "force deleted" event.
     */
    public function forceDeleted(Sotietkiem $sotietkiem): void
    {
        //
    }
}
