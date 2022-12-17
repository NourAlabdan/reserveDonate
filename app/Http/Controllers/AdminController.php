<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }
           else{
            return redirect()->back();
           }
            }
            else{
                return redirect('login');
            }
        
        
    }
    public function upload(Request $request){
        $doctor=new doctor;
       $image= $request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();
         return redirect()->back()->with('message','Doctor Added Successfuly');
    }
    public function showappointment()
    {
        if(Auth::id()){
            if(Auth::user()->usertype==1){

        $data=appointment::all();
return view ('admin.showappointment',compact('data'));
    }
    else{
        return redirect()->back();
    }
}
else{
return redirect('login');
}
}
    public function approved($id){
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();

    }
    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();

    }
    public function showdoctor()

    {
        $data=Doctor::all();
return view('admin.showdoctor',compact('data'));
    }
    public function deletedoctor($id)

    {
        $data=Doctor::find($id);
        $data->delete();
return redirect()->back();
    }
    public function updatedoctor($id){
        $data=Doctor::find($id);
        
        return view('admin.update_doctor',compact('data'));
    }
    public function editdoctor( Request $request,$id)
    {
        $doctor=Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Updated successfuly');
    }
    public function  emailview($id){


        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));

    }
    public function sendemail(Request $request,$id)
    {

        $data=Appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart,


        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('massage','Email send is successfuly');
    }
    //donations
    public function showdonation()
    {
        if(Auth::id()){
            if(Auth::user()->usertype==1){

        $data=Donation::all();
return view ('admin.showdonation',compact('data'));
    }
    else{
        return redirect()->back();
    }
}
else{
return redirect('login');
}
}
}
