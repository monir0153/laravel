<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider(){

        return view('admin.slider.create');
    }
    public function StoreSlider(Request $request){
        $slider_image = $request->file('image');
        
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image'=> $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('home.slider')->with('success','Slider Inserted successfully');
    }
    public function Edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }
    public function Update(Request $request,$id){
        
        $old_image = $request->old_image;
		$slider_image = $request->image;

        if($slider_image){
            
            $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

            $last_img = 'image/slider/'.$name_gen;
 
            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image'=> $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('home.slider')->with('success','Slider Updated successfully');
        
        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('home.slider')->with('success','Slider Updated successfully');
        }
    }
    public function Delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

		Slider::find($id)->delete();
		return redirect()->route('home.slider')->with('success','Slider Deleted successfully');
	}
}
