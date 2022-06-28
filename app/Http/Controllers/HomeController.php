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

    private function get_user_schedules() {
        // Get the user schedules
        $sch = DB::table('user_schedules')
        ->where('user_id', auth()->user()->id)
        ->get();

        $fsch = [];    

        foreach ($sch as $key => $value) {
            // Get the destination's name
            $destination = DB::table('common_locations')
                ->select('location')
                ->where('id', $value->destination_id)
                ->first();

            array_push($fsch, [
                'id' => $value->id,
                'day' => Self::dayToString($value->day),
                'destination' => $destination->location,
                'time' => $value->time
            ]);
        }

        return $fsch;
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
