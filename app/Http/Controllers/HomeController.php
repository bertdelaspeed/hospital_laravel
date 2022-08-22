<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
       if(Auth::id()){
           if(Auth::user()->usertype=='0'){
               $doctor = Doctor::all();
               return view('user.home', compact('doctor'));
           }
           else{
               return view('admin.home');
           }
       }

       else{
           return redirect()->back();
       }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        }
        else{

            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment;

        $data -> name = $request->name;
        $data -> email = $request->email;
        $data -> date = $request->date;
        $data -> phone = $request->phone;
        $data -> message = $request->message;
        $data -> doctor = $request->doctor;
        $data -> status = 'In progress';
        if(Auth::id()){

            $data -> user_id = Auth::user()->id;
        }

        $data -> save();
        return redirect()->back()->with('message', ' Appointment request Successful. We will contact you soon !');
    }

    public function myappointment()
    {
        if(Auth::id()){
            $userid =  Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)->get();
            return view('user.myappointment', compact('appoint'));
        }
        else
        return redirect()->back();
    }

    public function cancel_appointment($id)
    {
       $data = appointment:: find($id);
       $data -> delete();

       return redirect()->back();
    }
}
