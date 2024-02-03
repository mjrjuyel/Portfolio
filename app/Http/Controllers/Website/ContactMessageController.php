<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Carbon\Carbon;
use Session;

class ContactMessageController extends Controller
{
    public function send(Request $request){
        // return $request->all();
        $request->validate([
            'name'
        ]);
        $insert=ContactMessage::create([
            'cm_name'=>$request['name'],
            'cm_email'=>$request['email'],
            'cm_phone'=>$request['phone'],
            'cm_subject'=>$request['subject'],
            'cm_text'=>$request['message'],
            'cm_slug'=>'cm-'.uniqId(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully Message Sent');
            return redirect()->back();
        }
    }
}
