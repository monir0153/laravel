<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function HomeService(){
        $services = Service::latest()->get();
        return view('admin.service.index',compact('services'));
    }
    public function AddService(){
        return view('admin.service.create');
    }
    public function StoreService(Request $request){
        
        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at'=> Carbon::now(),
        ]);
        return redirect()->route('home.service')->with('success','Service added successfully');
    }
    public function Edit($id){
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
    }
    public function Update(Request $request, $id){
        Service::find($id)->update([
            'title' => $request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('home.service')->with('success','Service Updated successfully');
    }
    public function Delete($id){
        Service::find($id)->delete();
        return redirect()->route('home.service')->with('success','Service Deleted successfully');
    }
}
