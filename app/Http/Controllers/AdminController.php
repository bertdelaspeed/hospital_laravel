<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
       return view ('admin.add_doctor');
    }
    public function upload(Request $request)
    {
       $doctor = new doctor;
       $image = $request->file;   
       $imagename = time().'.'.$image->getClientoriginalExtension();
       $request->file->move('doctorimage', $imagename);
       $doctor->image = $imagename;
       $doctor->name = $request->name;
       $doctor->phone = $request->number;
       $doctor->room = $request->room;
       $doctor->specialty = $request->specialty;

       $doctor->save();

       return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

   public function showappointments()
   {
      $data = Appointment::all();
      return view('admin.showappointments', compact('data'));
   }

   public function approve($id)
   {
      $data = Appointment::find($id);
      $data->status = 'approved';
      $data->save();
      return redirect()->back();
   }
   public function cancel($id)
   {
      $data = Appointment::find($id);
      $data->status = 'cancelled';
      $data->save();
      return redirect()->back();
   }

   public function showdoctors()
   {
      $data = Doctor::all();
      return view('admin.showdoctors', compact('data'));
   }
   public function delete($id)
   {
      $data = Doctor::find($id);
      $data->delete();
      return redirect()->back();
   }

   public function updatedoctor($id)      
   {
      $data = Doctor::find($id);
      return view('admin.updatedoctor', compact('data'));
   }
   public function editdoctor(Request $request , $id)      
   {
      $doctor = Doctor::find($id);

      $doctor->name = $request->name;
      $doctor->phone = $request->phone;
      $doctor->specialty = $request->specialty;
      $doctor->room = $request->room;
    
      $image = $request->file;
      if($image){

         $imagename = time().'.'.$image->getClientoriginalExtension();
   
         $request->file->move('doctorimage', $imagename);
         $doctor->image = $imagename;
      }

      $doctor->save();
      return redirect()->back()->with('message', 'Doctor Details Updated !!');
      
   }
}
