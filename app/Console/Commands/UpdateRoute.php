<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Route;
class UpdateRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmd:update-route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $routes = config('dynamicroute');
        foreach($routes as $route){
            ///check if route exists in database 
            $check = Route::where('route',$route['route'])->first();
            if(empty($check)){
                Route::create($route);
            }
        }
    }
}
