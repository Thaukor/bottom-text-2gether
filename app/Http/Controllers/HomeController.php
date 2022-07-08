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

    private function dayToString($day) {
        if ($day == 1) return 'Lunes';
        elseif ($day == 2) return 'Martes';
        elseif ($day == 3) return 'Miércoles';
        elseif ($day == 4) return 'Jueves';
        return 'Viernes';
    }

    private function get_locations() {
        return DB::table('common_locations')->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['locations' => Self::get_locations()]);
    }
}
