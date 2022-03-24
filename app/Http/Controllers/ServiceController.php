<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('backends.services.index',['services'=>$services]);
    }
    public function create(){
        return view('backends.services.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $file = $request->file('image');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(public_path('assets/services'),$fileName);

        Service::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$fileName,
        ]);
        return redirect()->back()->with('status','Service Created Successfully!');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('backends.services.edit',['service'=>$service]);
    }
    
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $file = $request->file('image');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(public_path('assets/services'),$fileName);
        Service::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$fileName,
        ]);
        return redirect('services')->with('status','Service Updated Successfully!');
    }

    public function destroy($id){
        Service::destroy($id);
        return redirect()->back()->with('status','Service Deleted Successfully!');
    }
}
