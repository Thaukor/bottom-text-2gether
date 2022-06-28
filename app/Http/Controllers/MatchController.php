<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Check if a group exists

        // Check for destination and day
        $groups = DB::table('active_group')
            ->select('id')
            ->where('day', $request->input('day'))
            ->where('location_id', $request->input('destination'))
            ->get();
        
        if (len($groups) == 0) {

            // Create new group and add self as participant
            $id = DB::table('active_group')->insertGetId([
                'location_id' => $request->input('destination'),
                'day' => $request->input('day'),
                'active' => true
            ]);

            // Add self as group participant
            
        }

        return $groups;
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
        $data = DB::table('user_schedules')->where('id', $id)->get();

        $loc = DB::table('common_locations')->where('id', $id)->value('location');

        return view('user.matching', ['data'=>$loc]);
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
