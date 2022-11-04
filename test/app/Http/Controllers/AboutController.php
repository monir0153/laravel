<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout(){
        $about = HomeAbout::latest()->get();
        return view('admin.about.index',compact('about'));
    }
    public function AddAbout(){

        return view('admin.about.create');
    }
    public function StoreAbout(Request $request){
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis'  => $request->long_dis,
            'created_at'=> Carbon::now(),
        ]);

        return redirect()->route('home.about')->with('success','About insert successfully');
    }
    public function Edit($id){
        $about = HomeAbout::find($id);
        return view('admin.about.edit',compact('about'));
    }
    public function Update(Request $request,$id){
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis'  => $request->long_dis,
        ]);

        return redirect()->route('home.about')->with('success','About Updated successfully');
    }
    public function Delete($id){
        HomeAbout::find($id)->delete();
        return redirect()->back()->with('success','About Deleted successfully');
    }
}
