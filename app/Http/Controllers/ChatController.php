<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalePost;
use App\User;
use Chat;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convo = Chat::conversations()->getById($id);
        $allConvos = Chat::conversations()->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant(\Auth::user())
            ->get();
        return view('Messages.show', compact('convo', 'allConvos'));
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

    public function makeChatRoom(Request $request)
    {
        \DB::beginTransaction();
        $salePost = SalePost::find($request->id);
        $userId = $salePost->user_id;
        $user = User::find($userId);
        $conversation = Chat::createConversation([$user, \Auth::user()])->makePrivate();
        $data = ['title' => $salePost->title, 'description' => $salePost->description, 'user_to' => $user->name];
        $conversation->update(['data' => $data]);
        \DB::commit();

        return redirect()->route('chat.show', $conversation->id);

    }

    public function makeChatMessage($id, Request $request){
        \DB::beginTransaction();
        $convo = Chat::conversations()->getById($id);
        $message = Chat::message($request->message)
                        ->from(\Auth::user())
                        ->to($convo)
                        ->send();
        \DB::commit();
        return redirect()->back();
    }
}
