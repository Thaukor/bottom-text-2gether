<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
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
        // Add message to db
        $current_time = \Carbon\Carbon::now()->timestamp;

        DB::table('group_chats')->insert([
            'user_id' => auth()->user()->id,
            'group_id' => $request->input('group_id'),
            'message' => $request->input('msg'),
        ]);

        return response()->json(['time' => $current_time, 'msg' => $request->input('msg'), 'user_id' => auth()->user()->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get all messages on this group
        $messages = DB::table('group_chats')
            ->select(['group_chats.message', 'group_chats.user_id', 'users.name'])
            ->join('users', 'users.id', '=', 'group_chats.user_id')
            ->where('group_chats.group_id', $id)
            ->orderBy('sent_at', 'desc')
            ->limit(4)
            ->get();
        
        return $messages;
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
