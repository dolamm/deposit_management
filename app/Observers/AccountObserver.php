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
        $accountHistory->old_balance = $account->balance;
        
        if ($accountHistory->type == AccountHistory::TYPE_WITHDRAW) {
            $accountHistory->new_balance = $account->balance - $accountHistory->amount;
            $account->balance -= $accountHistory->amount;
        } 
        else if ($accountHistory->type == AccountHistory::TYPE_DEPOSIT){
            $accountHistory->new_balance = $account->balance + $accountHistory->amount;
            $account->balance += $accountHistory->amount;
        }
        $accountHistory->save();
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
