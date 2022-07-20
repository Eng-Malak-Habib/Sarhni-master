<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $messages=Message::where('user_id',Auth::id())->get();
        return view('my_messages')->with(compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create($id)
    {
                    //whereID  ->   whereID($id)
                    //find($id) w ashel first
                    //find or fail($id)
                    //bshof el id mogod wala laa
        $user= User::findOrFail($id);

        if($user->id==Auth::id())
           {
               return redirect()->route('profile.edit')->with('error','you cannot send message to ur self');
           }
           else{
               $user->visits+=1;
               $user->save();
             return  view('message')->with(compact('user'));
           }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,$id)
    {
         $request->validate([
             'message'=>'required|string|Max:500|min:3'
         ]);
         Message::create([
            'user_id'=>$id,
             'content'=>$request->input('message')
         ]);
         return redirect()->route('message.create',$id)->with('successs','Message sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */

}
