<?php

namespace App\Observers;

use App\Models\AccountHistory;
use App\Models\BankAccount;
class AccountObserver
{
    /**
     * Handle the AccountHistory "created" event.
     */
    public function created(AccountHistory $accountHistory): void
    {
        //update old balance and new balance
        $account = BankAccount::where('account_number', $accountHistory->account_number)->first();
        $accountHistory->old_balance = $account->blance;
        $accountHistory->new_balance = $account->blance + $accountHistory->amount;
        $accountHistory->save();
        //update balance
        $account->blance = $accountHistory->new_balance;
        $account->save();
    }

    // /**
    //  * Handle the AccountHistory "updated" event.
    //  */
    // public function updated(AccountHistory $accountHistory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AccountHistory "deleted" event.
    //  */
    // public function deleted(AccountHistory $accountHistory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AccountHistory "restored" event.
    //  */
    // public function restored(AccountHistory $accountHistory): void
    // {
    //     //
    // }

    // /**
    //  * Handle the AccountHistory "force deleted" event.
    //  */
    // public function forceDeleted(AccountHistory $accountHistory): void
    // {
    //     //
    // }
}
