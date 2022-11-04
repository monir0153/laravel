<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function AllCat(){
		// Eloquent ORM showing data
		$categories = Category::latest()->paginate(5);
		// Query builder join database relation one to one
		// $categories = DB::table('categories')->latest()->paginate(5);
		// Query builder join database relation one to one
		// $categories = DB::table('categories')->join('users','categories.user_id','users.id')->select('categories.*','users.name')->latest()->paginate(5);
		$trashCat = Category::onlyTrashed()->latest()->paginate(3);

		return view('admin.category.index',compact('categories','trashCat'));
	}
	public function AddCat(Request $request){
		$validated = $request->validate([
            'category_name' => 'required|max:200',
            
        ]);
		
		Category::insert([
			'category_name'		=> $request->category_name,
			'user_id' 			=> Auth::user()->id,
			'created_at' 		=> Carbon::now()
		]);
		
		return redirect()->back()->with('success','Category inserted successfully');
	}
	public function Edit($id){
		// Eloquent ORM
        $categories = Category::find($id);
		// Query builder
        // $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }
	public function Update(Request $request,$id){
		//  for Eloquent ORM
		$update = Category::find($id)->update([
			"category_name" => $request->category_name,
			'user_id'		=> Auth::user()->id
		]);

		// for Query builder
		// $data = array();
		// $data['category_name'] = $request->category_name;
		// $data['user_id']	   = Auth::user()->id;
		// DB::table('categories')->where('id',$id)->update($data);	
		// return redirect()->route('all.category')->with('success','Category Updated successfully');
	}
	public function SoftDelete($id){
		Category::find($id)->delete();
		return redirect()->route('all.category')->with('success','Category Soft Deleted successfully');
	}
	public function Restore($id){
		Category::withTrashed()->find($id)->restore();
		return redirect()->route('all.category')->with('success','Category Restored successfully');
	}
	public function Delete($id){
		Category::onlyTrashed()->find($id)->forceDelete();
		return redirect()->route('all.category')->with('success','Category Permanently Deleted successfully');
	}
}
