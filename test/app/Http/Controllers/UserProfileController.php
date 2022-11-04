<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Cpassword(){
        return view('admin.body.change_password');
    }
    public function Upadtepassword(Request $request){
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current Password Invalid',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    public function UProfile(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.change_profile',compact('user'));
            }
        }
    }
    public function PUpdate(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $notification = array(
                'message' => 'Profile update successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Profile not updated',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
