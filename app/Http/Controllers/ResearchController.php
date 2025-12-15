<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInformation;
use Illuminate\Support\Facades\Log;

class ResearchController extends Controller
{
    public function ResearchInfo(){
        $userPlatinumID = auth()->user()->users->P_ID;
        $data = ResearchInformation::where('P_ID', $userPlatinumID)->get();

        return view('manage_research.PlatinumresearchInfo', compact('data'));
    }

    public function addResearch(){
        return view('manage_research.PlatinumaddResearch');
    }

    public function saveResearch(Request $request){
        $request->validate([
            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'RI_timeline' => 'required',
            'RI_budget' => 'required',
            'RI_outcome' => 'required', 
            'RI_reference' => 'required'
        ]);

        $research = new ResearchInformation();
        $research->P_ID = auth()->user()->users->P_ID;
        $research->RI_title = $request->RI_title;
        $research->RI_author = $request->RI_author ?? 'Default Author';
        $research->RI_abstract = $request->RI_abstract;
        $research->RI_area = $request->RI_area;
        $research->RI_objective = $request->RI_objective;
        $research->RI_methodology = $request->RI_methodology;
        $research->RI_background = $request->RI_background;
        $research->RI_timeline = $request->RI_timeline;
        $research->RI_budget = $request->RI_budget;
        $research->RI_outcome = $request->RI_outcome;
        $research->RI_reference = $request->RI_reference;
        $research->save();

        return redirect()->back()->with('success','Research added successfully');
    }

    public function editResearch($RI_ID){
        $userPlatinumID = auth()->user()->users->P_ID;
        $data = ResearchInformation::where('RI_ID', $RI_ID)->where('P_ID', $userPlatinumID)->firstOrFail();
        return view('manage_research.PlatinumeditResearch', compact('data'));
    }

    public function updateResearch(Request $request){
        $request->validate([
            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'RI_timeline' => 'required',
            'RI_budget' => 'required',
            'RI_outcome' => 'required', 
            'RI_reference' => 'required'
        ]);

        $userPlatinumID = auth()->user()->users->P_ID;
        $research = ResearchInformation::where('RI_ID', $request->RI_ID)->where('P_ID', $userPlatinumID)->firstOrFail();

        $research->RI_title = $request->RI_title;
        $research->RI_author = $request->RI_author ?? 'Default Author';
        $research->RI_abstract = $request->RI_abstract;
        $research->RI_area = $request->RI_area;
        $research->RI_objective = $request->RI_objective;
        $research->RI_methodology = $request->RI_methodology;
        $research->RI_background = $request->RI_background;
        $research->RI_timeline = $request->RI_timeline;
        $research->RI_budget = $request->RI_budget;
        $research->RI_outcome = $request->RI_outcome;
        $research->RI_reference = $request->RI_reference;
        $research->save();

        return redirect()->back()->with('success','Research updated successfully');
    }

    public function deleteResearch($RI_ID) {
        $userPlatinumID = auth()->user()->users->P_ID;
        $research = ResearchInformation::where('RI_ID', $RI_ID)
                                        ->where('P_ID', $userPlatinumID)
                                        ->firstOrFail();
        $research->delete();
        return redirect()->back()->with('success', 'Research deleted successfully');
    }    

    public function view($RI_ID){
        $userPlatinumID = auth()->user()->users->P_ID;
        $data = ResearchInformation::where('RI_ID', $RI_ID)->where('P_ID', $userPlatinumID)->firstOrFail();
        return view('manage_research.PlatinumviewResearch', compact('data'));
    }
}