<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use Carbon\Carbon;
use Auth;
use PDF;

class ServiceController extends Controller
{
    public function index(){
        $allser = Service::where('ser_status','1')->latest('id')->get();
        // dd($allser);
        return view('admin.service.all',compact('allser'));
    }

    public function add(){
        return view('admin.service.add');
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'icon'=>'required',
            'detail'=>'required',
        ]);
        // return $request->all();
        $insert=Service::create([
            'ser_title'=>$request['title'],
            'ser_icon'=>$request['icon'],
            'ser_detail'=>$request['detail'],
            'ser_creator'=>Auth::user()->id,
            'ser_slug'=>'ser-'.uniqId(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Service Data Inserted');
            return redirect()->back();
        }
    }
    public function view($slug){
        $view=Service::where('ser_status','1')->where('ser_slug',$slug)->first();
        return view('admin.service.view',compact('view'));
    }

    public function edit($slug){
        $edit = Service::with('creator')->where('ser_status','1')->where('ser_slug',$slug)->first();
        return view('admin.service.edit',compact('edit'));
    }

    public function update(Request $request){
        $id=$request['id'];
        $slug=$request['slug'];

        $this->validate($request,[
            'title'=>'required',
            'icon'=>'required',
            'detail'=>'required',
        ]);

        $update= Service::where('id',$id)->update([
            'ser_title'=>$request['title'],
            'ser_icon'=>$request['icon'],
            'ser_detail'=>$request['detail'],
            'ser_slug'=>$slug,
            'ser_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Update Info Successfully');
            return redirect('dashboard/service/edit/'.$slug);
        }
    }

    public function softdel(Request $request){
        $id =$request['modal_id'];
        $softdel = Service::where('ser_status','1')->where('id',$id)->update([
            'ser_status'=>0,
            'ser_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);

        if($softdel){
            Session::flash('success','Moved to The Recycle bin');
            return redirect('dashboard/service');
        }
        else{
            Session::flash('error','Failed To Delete');
        }
    }
    public function pdfmake(){
        $data=Service::where('ser_status','1')->oldest('id')->get();
        $pdf = PDF::loadView('admin.service.pdf',compact('data'));
        return $pdf->stream('service.pdf');
    }
}
