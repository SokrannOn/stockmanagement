<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public function create()
    {
        $channel = Channel::where('active',1)->get();
        return view('admin.channels.create',compact('channel'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'description'   =>'required'
        ],[
            'name.required' =>'Channel name required',
            'description.required' =>'Description required'
        ]);

        $channel = new Channel();
        $channel->name = $request->input('name');
        $channel->description = $request->input('description');
        $channel->user_id = Auth::user()->id;
        $channel->active = 1;
        $channel->save();
        return redirect('/admin/channel/create');
    }
    public function delete($id)
    {
        $channel = Channel::find($id);
        $channel->active =0;
        $channel->save();
        return redirect('/admin/channel/create');
    }
    public function edit($id)
    {
        $channel = Channel::find($id);
        return view('admin.channels.edit',compact('channel'));
    }
    public function update(Request $request, $id){
        $channel = Channel::find($id);
        $channel->name = $request->input('name');
        $channel->description = $request->input('description');
        $channel->user_id = Auth::user()->id;
        $channel->save();
        return redirect('/admin/channel/create');
    }

}
