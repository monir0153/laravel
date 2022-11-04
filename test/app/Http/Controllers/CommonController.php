<?php

namespace App\Http\Controllers;
use App\Models\MultiPic;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function Portfolio(){
        $images = MultiPic::all();
        return view('pages.portfolio',compact('images'));
    }
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function AddContact(){
        return view('admin.contact.create');
    }
    public function StoreContact(Request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address'  => $request->address,
            'created_at'=> Carbon::now(),
        ]);

        return redirect()->route('admin.contact')->with('success','contact insert successfully');
    }
    public function ContactEdit($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }
    public function ContactUpdate(Request $request,$id){
        Contact::find($id)->update([
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
        ]);

        return redirect()->route('admin.contact')->with('success', 'contact updated successfully');
    }
    public function ContactDelete($id){
        Contact::find($id)->delete();
        return redirect()->back()->with('success','contact Deleted successfully');
    }

    public function Contact(){
        $contact = DB::table('contacts')->first();
        return view('pages.contact',compact('contact'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message'  => $request->message,
            'created_at'=> Carbon::now(),
        ]);

        return redirect()->route('contact')->with('success','message send successfully');
    }
    public function AdminMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }
    public function MessageDelete($id){
        ContactForm::find($id)->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }
}
