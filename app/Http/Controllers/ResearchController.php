<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInformation;

class ResearchController extends Controller
{
    /* ===============================
       VIEW RESEARCH LIST
    =============================== */
    public function ResearchInfo(){
        $userPlatinumID = auth()->user()->users->P_ID;
        $data = ResearchInformation::where('P_ID', $userPlatinumID)->get();

        return view('manage_research.PlatinumresearchInfo', compact('data'));
    }

    /* ===============================
       ADD RESEARCH PAGE
    =============================== */
    public function addResearch(){
        return view('manage_research.PlatinumaddResearch');
    }

    /* ===============================
       SAVE RESEARCH (CR-2 APPLIED)
    =============================== */
    public function saveResearch(Request $request){

        // ✅ Updated validation (CR-2)
        $request->validate([
            'RI_title' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'RI_budget' => 'required',
        ]);

        // ✅ Combine dates into one timeline string
        $timeline = $request->start_date . ' to ' . $request->end_date;

        $research = new ResearchInformation();
        $research->P_ID = auth()->user()->users->P_ID;
        $research->RI_title = $request->RI_title;
        $research->RI_abstract = $request->RI_abstract;
        $research->RI_area = $request->RI_area;
        $research->RI_objective = $request->RI_objective;
        $research->RI_methodology = $request->RI_methodology;
        $research->RI_background = $request->RI_background;
        $research->RI_timeline = $timeline;
        $research->RI_budget = $request->RI_budget;

        // ✅ DB-required fields (safe defaults)
        $research->RI_author = 'N/A';
        $research->RI_outcome = 'N/A';
        $research->RI_reference = 'N/A';

        $research->save();

        return redirect()->back()->with('success','Research added successfully');
    }

    /* ===============================
       EDIT RESEARCH PAGE
    =============================== */
    public function editResearch($RI_ID){
        $userPlatinumID = auth()->user()->users->P_ID;

        $data = ResearchInformation::where('RI_ID', $RI_ID)
                    ->where('P_ID', $userPlatinumID)
                    ->firstOrFail();

        return view('manage_research.PlatinumeditResearch', compact('data'));
    }

    /* ===============================
       UPDATE RESEARCH (CR-2 APPLIED)
    =============================== */
    public function updateResearch(Request $request){

        // ✅ Updated validation (CR-2)
        $request->validate([
            'RI_title' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'RI_budget' => 'required',
        ]);

        $userPlatinumID = auth()->user()->users->P_ID;

        $research = ResearchInformation::where('RI_ID', $request->RI_ID)
                    ->where('P_ID', $userPlatinumID)
                    ->firstOrFail();

        // ✅ Combine dates into timeline
        $timeline = $request->start_date . ' to ' . $request->end_date;

        $research->RI_title = $request->RI_title;
        $research->RI_abstract = $request->RI_abstract;
        $research->RI_area = $request->RI_area;
        $research->RI_objective = $request->RI_objective;
        $research->RI_methodology = $request->RI_methodology;
        $research->RI_background = $request->RI_background;
        $research->RI_timeline = $timeline;
        $research->RI_budget = $request->RI_budget;

        // ✅ Keep existing DB values or fallback
        $research->RI_author = $research->RI_author ?? 'N/A';
        $research->RI_outcome = $research->RI_outcome ?? 'N/A';
        $research->RI_reference = $research->RI_reference ?? 'N/A';

        $research->save();

        return redirect()->back()->with('success','Research updated successfully');
    }

    /* ===============================
       DELETE RESEARCH
    =============================== */
    public function deleteResearch($RI_ID){
        $userPlatinumID = auth()->user()->users->P_ID;

        $research = ResearchInformation::where('RI_ID', $RI_ID)
                        ->where('P_ID', $userPlatinumID)
                        ->firstOrFail();

        $research->delete();

        return redirect()->back()->with('success', 'Research deleted successfully');
    }

    /* ===============================
       VIEW SINGLE RESEARCH
    =============================== */
    public function view($RI_ID){
        $userPlatinumID = auth()->user()->users->P_ID;

        $data = ResearchInformation::where('RI_ID', $RI_ID)
                    ->where('P_ID', $userPlatinumID)
                    ->firstOrFail();

        return view('manage_research.PlatinumviewResearch', compact('data'));
    }
}
