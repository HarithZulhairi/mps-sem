<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LoginDetails;
use App\Models\Staff;
use App\Models\Platinum;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function listPlatinum(){
        $register = Platinum::get();
        return view('manage_profile.PlatinumList', compact ('register'));
    }

    public function StafflistPlatinum(){
        $register = Platinum::get();
        return view('manage_profile.StaffListUsers', compact ('register'));
    }
    
    public function addregister(){
        return view('manage_registration.StaffRegisterPlatinum');
    }

    public function saveRegistration(Request $request){

        $request->validate([
            'P_Name' => 'required',
            'P_IC' => 'required',
            'P_Gender' => 'required',
            'P_Religion' => 'required',
            'P_Race' => 'required',
            'P_Citizenship' => 'required',
            'P_Address' => 'required',
            'P_PhoneNum' => 'required',
            'P_Email' => 'required',
            'P_FBName' => 'required',
            'P_EduLevel' => 'required',
            'P_EduField' => 'required',
            'P_EduInst' => 'required',
            'P_Occupation' => 'required',
            'P_Stud_Sponsor' => 'required',
            'P_Batch' => 'required',
            'P_Referral' => 'required',
            'P_RefName' => 'required',
            'P_RefBatch' => 'required',
            'P_DOApp' => 'required',
            'P_Picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:24028'
        ]);
    
        $name = $request->P_Name;
        $ic = $request->P_IC;
        $gender = $request->P_Gender;
        $religion = $request->P_Religion;
        $race = $request->P_Race;
        $citizen = $request->P_Citizenship;
        $address = $request->P_Address;
        $phonenum = $request->P_PhoneNum;
        $email = $request->P_Email;
        $fb = $request->P_FBName;
        $edulevel = $request->P_EduLevel;
        $edufield = $request->P_EduField;
        $eduinst = $request->P_EduInst;
        $occupation = $request->P_Occupation;
        $sponsor = $request->P_Stud_Sponsor;
        $batch = $request->P_Batch;
        $referral = $request->P_Referral;
        $refname = $request->P_RefName;
        $refbatch = $request->P_RefBatch;
        $date = $request->P_DOApp;
    
        if ($request->hasFile('P_Picture')) {
            $picture = $request->file('P_Picture');
            $pictureName = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('uploads'), $pictureName);
        }
    
        $last6digit = substr($request->P_IC, -6); //  6 digit last ic
        $password = Hash::make($last6digit); 
    
        $newuser = new User();
        $newuser->name = $request->P_Name;
        $newuser->email = $request->P_Email;
        $newuser->password = $password;
        $newuser->role = "platinum";
    
        if($newuser->save()){
    
            $user_id = $newuser->id;
    
            $platinum = new Platinum();
            $platinum->P_Name = $name;
            $platinum->user_id = $user_id;
            $platinum->P_IC = $ic;
            $platinum->P_Gender = $gender;
            $platinum->P_Religion = $religion;
            $platinum->P_Race = $race;
            $platinum->P_Citizenship = $citizen;
            $platinum->P_Address = $address;
            $platinum->P_PhoneNum = $phonenum;
            $platinum->P_Email = $email;
            $platinum->P_FBName = $fb;
            $platinum->P_EduLevel = $edulevel;
            $platinum->P_EduField = $edufield;
            $platinum->P_EduInst = $eduinst;
            $platinum->P_Occupation = $occupation;
            $platinum->P_Stud_Sponsor = $sponsor;
            $platinum->P_Batch = $batch;
            $platinum->P_Referral = $referral;
            $platinum->P_RefName = $refname;
            $platinum->P_RefBatch = $refbatch;
            $platinum->P_DOApp = $date;
            $platinum->P_Picture = $pictureName;
            $platinum->save();
    
            return redirect()->back()->with('success','Platinum added successfully');
    
        } else {
            return redirect()->back()->with('error','Error!');
        }
    }    

    public function StaffviewRegister($P_ID){
        
        $register = Platinum::where('P_ID','=',$P_ID)->first();

        return view('manage_profile.StaffViewPlatinumProfile',compact('register'));
    }

    public function PlatinumviewRegister($P_ID){
        
        $register = Platinum::where('P_ID','=',$P_ID)->first();

        return view('manage_profile.PlatinumViewPlatinumProfile',compact('register'));
    }

    public function MentorviewRegister($P_ID){
        
        $register = Platinum::where('P_ID','=',$P_ID)->first();

        return view('manage_profile.MentorViewPlatinumProfile',compact('register'));
    }

    public function viewProfile($P_ID){
        $register = Platinum::where('P_ID', '=', $P_ID)->first();
    
        if (!$register) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        return view('manage_profile.PlatinumViewProfile', compact('register'));
    }    

    public function editProfile($P_ID){
        $register = Platinum::findOrFail($P_ID);
        
        return view('manage_profile.PlatinumEditProfile', compact('register'));
    }

    public function updateProfile(Request $request, $P_ID){
        $user = Platinum::findOrFail($P_ID);

        $request->validate([
            'P_Name' => 'required|string|max:255',
            'P_IC' => 'required|string|max:255',
            'P_Gender' => 'required|string|max:255',
            'P_Religion' => 'required|string|max:255',
            'P_Race' => 'required|string|max:255',
            'P_Citizenship' => 'required|string|max:255',
            'P_Address' => 'required|string|max:255',
            'P_PhoneNum' => 'required|string|max:255',
            'P_Email' => 'required|email|max:255',
            'P_FBName' => 'required|string|max:255',
            'P_EduLevel' => 'required|string|max:255',
            'P_EduField' => 'required|string|max:255',
            'P_EduInst' => 'required|string|max:255',
            'P_Occupation' => 'required|string|max:255',
            'P_Stud_Sponsor' => 'required|string|max:255',
            'P_Batch' => 'required|string|max:255',
            'P_Referral' => 'required|string|max:255',
            'P_RefName' => 'required|string|max:255',
            'P_RefBatch' => 'required|string|max:255',
            'P_DOApp' => 'required|string|max:255',
        ]);

        $user->P_Name = $request->input('P_Name');
        $user->P_IC = $request->input('P_IC');
        $user->P_Gender = $request->input('P_Gender');
        $user->P_Religion = $request->input('P_Religion');
        $user->P_Race = $request->input('P_Race');
        $user->P_Citizenship = $request->input('P_Citizenship');
        $user->P_Address = $request->input('P_Address');
        $user->P_PhoneNum = $request->input('P_PhoneNum');
        $user->P_Email = $request->input('P_Email');
        $user->P_FBName = $request->input('P_FBName');
        $user->P_EduLevel = $request->input('P_EduLevel');
        $user->P_EduField = $request->input('P_EduField');
        $user->P_EduInst = $request->input('P_EduInst');
        $user->P_Occupation = $request->input('P_Occupation');
        $user->P_Stud_Sponsor = $request->input('P_Stud_Sponsor');
        $user->P_Batch = $request->input('P_Batch');
        $user->P_Referral = $request->input('P_Referral');
        $user->P_RefName = $request->input('P_RefName');
        $user->P_RefBatch = $request->input('P_RefBatch');
        $user->P_DOApp = $request->input('P_DOApp');

        $user->save();

        return redirect()->route('manage_profile.PlatinumViewProfile', ['id' => $user->P_ID])->with('success', 'Profile updated successfully');
    }
    
    public function MentorlistPlatinum(){
        $register = Platinum::get();
        return view('manage_profile.MentorListUsers', compact ('register'));
    }

    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $university = $request->query('university');
        
        $staff = Staff::all();
        $register = Platinum::all();
        $mentors = Mentor::all();

        $combined = collect();

        foreach ($staff as $person) {
            $person->type = 'staff';
            $combined->push($person);
        }

        foreach ($register as $platinum) {
            $platinum->type = 'platinum';
            $combined->push($platinum);
        }

        foreach ($mentors as $mentor) {
            $mentor->type = 'mentor';
            $combined->push($mentor);
        }

        if ($filter) {
            $combined = $combined->where('type', $filter);

            if ($filter == 'platinum' && $university) {
                $combined = $combined->where('P_EduInst', $university);
            }
        }

        $universities = $register->pluck('P_EduInst')->unique();

        return view('manage_profile.StaffListUsers', compact('combined', 'universities'));
    }

    public function generateReport(Request $request)
    {
        $university = $request->query('university');
        
        if (!$university) {
            return redirect()->back()->with('error', 'No university selected');
        }

        $register = Platinum::where('P_EduInst', $university)->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=PlatinumReport.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Name', 'IC', 'Gender', 'Address', 'Phone', 'Email'];

        $callback = function() use ($register, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($register as $user) {
                fputcsv($file, [
                    $user->P_Name,
                    $user->P_IC,
                    $user->P_Gender,
                    $user->P_Address,
                    $user->P_PhoneNum,
                    $user->P_Email
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function StaffviewStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view('manage_profile.StaffViewStaffProfile', compact('staff'));
    }

    public function StaffviewMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('manage_profile.StaffViewMentorProfile', compact('mentor'));
    }

    public function indexMentor()
    {
        $staff = Staff::all();
        $register = Platinum::all();
        $mentors = Mentor::all();

        $combine = collect();

        foreach ($staff as $person) {
            $person->type = 'staff';
            $combine->push($person);
        }

        foreach ($register as $platinum) {
            $platinum->type = 'platinum';
            $combine->push($platinum);
        }

        foreach ($mentors as $mentor) {
            $mentor->type = 'mentor';
            $combine->push($mentor);
        }

        return view('manage_profile.MentorListUsers', compact('combine'));
    }

    public function showMentorProfile($id)
    {
        $mentor = Mentor::where('user_id', $id)->first();

        if (!$mentor) {
            return view('manage_profile.MentorViewProfile')->withErrors('Mentor not found.');
        }

        return view('manage_profile.MentorViewProfile', compact('mentor'));
    }

    public function editMentorProfile($id)
    {
        $mentor = Mentor::where('user_id', $id)->first();

        if (!$mentor) {
            return redirect()->back()->withErrors('Mentor not found.');
        }

        return view('manage_profile.MentorEditProfile', compact('mentor'));
    }

    public function updateMentorProfile(Request $request)
    {
        $mentor = Mentor::where('user_id', $request->user_id)->first();

        if (!$mentor) {
            return redirect()->back()->withErrors('Mentor not found.');
        }

        $mentor->M_name = $request->M_name;
        $mentor->M_IC = $request->M_IC;
        $mentor->M_gender = $request->M_gender;
        $mentor->M_address = $request->M_address;
        $mentor->M_phoneNum = $request->M_phoneNum;
        $mentor->M_email = $request->M_email;
        $mentor->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function showStaffProfile($id)
    {
        $staff = Staff::where('user_id', $id)->first();

        if (!$staff) {
            return view('manage_profile.StaffViewProfile')->withErrors('Staff not found.');
        }

        return view('manage_profile.StaffViewProfile', compact('staff'));
    }

    public function editStaffProfile($id)
    {
        $staff = Staff::where('user_id', $id)->first();

        if (!$staff) {
            return redirect()->back()->withErrors('Staff not found.');
        }

        return view('manage_profile.StaffEditProfile', compact('staff'));
    }

    public function updateStaffProfile(Request $request)
    {
        $staff = Staff::where('user_id', $request->user_id)->first();

        if (!$staff) {
            return redirect()->back()->withErrors('Staff not found.');
        }

        $staff->S_name = $request->S_name;
        $staff->S_IC = $request->S_IC;
        $staff->S_gender = $request->S_gender;
        $staff->S_address = $request->S_address;
        $staff->S_phoneNum = $request->S_phoneNum;
        $staff->S_email = $request->S_email;
        $staff->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function MentorviewStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view('manage_profile.MentorViewStaffProfile', compact('staff'));
    }

    public function MentorviewMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('manage_profile.MentorViewMentorProfile', compact('mentor'));
    }

    public function listRegistered(){
        $register = Platinum::get();
        return view('manage_registration.MentorViewRegisteredUser', compact ('register'));
    }
}