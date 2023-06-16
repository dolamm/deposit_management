<?php

namespace App\Providers;

use App\Models\AccountHistory;
use App\Models\BCDoanhSo;
use App\Models\BcSoLuongSo;
use App\Models\Sotietkiem;
use App\Models\PassBookHistory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\AccountObserver;
use App\Observers\BCDoanhSoObserver;
use App\Observers\BcSLSoObserver;
use App\Observers\SotietkiemObserver;
use App\Observers\PassbookHSObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    // trigger
    protected $observers = [
        AccountHistory::class => [
            AccountObserver::class,
        ],
        BCDoanhSo::class => [
            BCDoanhSoObserver::class,
        ],
        BcSoLuongSo::class => [
            BcSLSoObserver::class,
        ],
        Sotietkiem::class => [
            SotietkiemObserver::class,
        ],
        PassBookHistory::class => [
            PassbookHSObserver::class,
        ],
    ];
}
