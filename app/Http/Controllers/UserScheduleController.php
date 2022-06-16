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

    private function get_locations() {
        return DB::table('common_locations')->get();
    }

    private function get_user_schedules() {
        return auth()->user()->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Self::get_locations();
        $user_schedules = Self::get_user_schedules();

        return view('user.profile', ['locations' => $locations, 'schedule' => $user_schedules]);
    }

    /**
     * Searches for a location matching the name
     * 
     */
    public function get_location($location) {
        return DB::table('common_locations')->where('location', $location)->value('id');
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
    }
}
