<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\AboutUs;
use carbon\carbon;
use Session;
use Auth;

class AboutUsController extends Controller
{
    public function index(){
        $about = AboutUs::where('id','1')->first();
        return view('admin.about.add',compact('about'));
    }

    public function update(Request $request){
    
        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'detail'=>'required',
            'btn'=>'required',
            'pic'=>'',
        ]);
        $update=AboutUs::where('id','1')->update([
            'abo_title'=>$request['title'],
            'abo_subtitle'=>$request['subtitle'],
            'abo_detail'=>$request['detail'],
            'abo_btn'=>$request['btn'],
            'abo_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/about/'), $imageName);
            // return $imageName;
            // Save $imageName to your database or perform other operations as needed
            AboutUs::where('id','1')->update([
                'abo_pic'=>$imageName,
            ]);
        }
        if($update){
            Session::flash('success','About Us Detailed Has Updated!');
            return redirect()->back();
        }
        else{
            Session::flash('error','Failed to Updated');
            return redirect()->back();
        }
    }
}
