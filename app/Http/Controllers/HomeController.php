<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function get_locations() {
        return DB::table('common_locations')->get();
    }

    private function get_user_schedules() {
        return auth()->user()->id;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = Self::get_locations();
        $user_schedules = Self::get_user_schedules();
        return view('home', ['locations' => $locations, 'schedule' => $user_schedules]);
    }
}
