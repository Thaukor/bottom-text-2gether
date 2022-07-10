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
        $id = -1;

        if (count($groups) == 0) {

            // Create new group and add self as member
            $id = DB::table('active_group')->insertGetId([
                'location_id' => $request->input('destination'),
                'day' => $request->input('day'),
                'active' => true
            ]);

            // Add self as group member
            DB::table('group_participant')->insert([
                'user_id' => auth()->user()->id,
                'group_id' => $id
            ]);
        } else {
            $id = $groups[0]->id;

            // Check if user is a member
            $worst_check_ever = DB::table('group_participant')
                ->select('group_id')
                ->where('user_id', auth()->user()->id)
                ->where('group_id', $id)
                ->get();

            if (count($worst_check_ever) == 0) {
                // Add self as group member
                DB::table('group_participant')->insert([
                    'user_id' => auth()->user()->id,
                    'group_id' => $id
                ]);
            }
        }

        // Get group member
        $members = DB::table('group_participant')
            ->select('user_id')
            ->where('group_id', $id)
            ->get();

        $f_members = [];
        
        foreach ($members as $key => $value) {
            $user = DB::table('users')
                ->select('name', 'id')
                ->where('id', $value->user_id)
                ->first();
            array_push($f_members, [
                'name' => $user->name,
                'user_id' => $user->id,
            ]);
        }


        return response()->json(['members' => $f_members, 'group_id' => $id]);
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
        $data = DB::table('user_schedules')->where('id', $id)->first();

        $loc = DB::table('common_locations')->where('id', $data->destination_id)->value('location');
        $f_data = [
            'destination_id' => $data->destination_id,
            'day' => $data->day,
            'loc' => $loc
        ];
        return view('user.matching', ['data'=>$f_data]);
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
        $deleted = DB::table('group_participant')
            ->where('user_id', auth()->user()->id)
            ->where('group_id', $id)
            ->delete();
        return response()->json(['data' => $id, 'id_user' => auth()->user()->id, 'msg' => 'Entrada borrada']);
    }
}
