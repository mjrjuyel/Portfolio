<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use carbon\carbon;
use Session;
use Auth;


class BannerController extends Controller
{
    public function index(){
        $banner = Banner::where('id','1')->first();
        return view('admin.banner.add',compact('banner'));
    }

    public function update(Request $request){

        // return $request->all();
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'detail'=>'required',
            'btn'=>'required',
            'pic'=>'',
        ]);

        $update=Banner::where('id','1')->update([
            'ban_title'=>$request['title'],
            'ban_subtitle'=>$request['subtitle'],
            'ban_detail'=>$request['detail'],
            'ban_btn'=>$request['btn'],
            'ban_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = 'ban-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/banner/'), $imageName);
            Banner::where('id','1')->update([
                'ban_pic'=>$imageName,
                'updated_at'=>carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','Banner Detail Updated');
            return redirect()->back();
        }
        else{
            Session::flash('error','Banner Failed To Updated');
            return redirect()->back();
        }
    }
}
