<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = DB::table('user_schedules')
                        ->select(['user_schedules.id', 'user_schedules.day', 'user_schedules.time', 'user_schedules.destination_id', 'common_locations.location'])
                        ->join('common_locations', 'common_locations.id', '=', 'user_schedules.destination_id')
                        ->where('user_schedules.user_id', auth()->user()->id)
                        ->get();

        return $schedule;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $repeat = ($request->input('repeat') == 'on');

        $id = DB::table('user_schedules')->insertGetId([
            'user_id' => auth()->user()->id,
            'day' => $request->input('day'),
            'time' => $request->input('time'),
            'destination_id' => $request->input('destination'),
            'repeat' => $repeat,
            'active' => true
        ]);
        
        return response()->json(['success'=>'Entrada creada con id ' . $id . ' exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = DB::table('user_schedules')
                        ->where('id', $id)
                        ->delete();
        return $deleted;
    }
}
