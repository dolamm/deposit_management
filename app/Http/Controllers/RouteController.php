<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function index($component)
    {
        return view('admin.config', [
            'routeName' => $component
        ]);
    }
}
