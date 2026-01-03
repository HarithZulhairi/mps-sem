<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;

class ExpertController extends Controller
{
    public function FindExpert()
    {
        return view('manage_expertdomain.FindExpert');
    }

    public function UploadExpert()
    {
        return view('manage_expertdomain.UploadExpert');
    }

    public function saveExpert(Request $request)
    {

        $userPlatinumID = auth()->user()->users->P_ID;

        $data = $request->validate([

            'E_Name' => 'required|string|max:255',
            'E_Title' => 'required|string|max:255',
            'E_Email' => 'required|email|max:255',
            'E_Position' => 'required|string|max:255',
            'E_Workplace' => 'required|string|max:255',
            'E_Qualification' => 'required|array',
            'E_Photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:24028',
            'E_CategoryExpertise' => 'required|string|max:255',
            'E_GroupExpertise' => 'required|array',
            'E_AreaExpertise' => 'required|array',
            'E_ResearchTitle' => 'required|array',
            'E_DurationStart' => 'required|array',
            'E_DurationEnd' => 'required|array',
            'E_Agent' => 'required|array',
            'E_Role' => 'required|array',
            'E_Cost' => 'required|array',
            'E_Status' => 'required|array',
            'E_PublicationTitle' => 'required|array',
            'E_Authors' => 'required|array',
            'E_PublicationDate' => 'required|array',
            'E_Source' => 'required|array',
            'E_Volume' => 'required|array',
            'E_Pages' => 'required|array',
            'E_Publisher' => 'required|array',
            'E_Link' => 'required|array',
            'E_PublicationResearch' => 'nullable|array',
        ]);

        if ($request->hasFile('E_Photo')) {
            $picture = $request->file('E_Photo');
            $pictureName = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('uploads'), $pictureName);
            $data['E_Photo'] = $pictureName;
        }

        $data['P_ID'] = $userPlatinumID;

        ExpertDomain::create([
            'P_ID' => $data['P_ID'],
            'E_Name' => $data['E_Name'],
            'E_Title' => $data['E_Title'],
            'E_Email' => $data['E_Email'],
            'E_Position' => $data['E_Position'],
            'E_Workplace' => $data['E_Workplace'],
            'E_Qualification' => json_encode($data['E_Qualification']),
            'E_Photo' => $data['E_Photo'] ?? null,
            'E_CategoryExpertise' => $data['E_CategoryExpertise'],
            'E_GroupExpertise' => json_encode($data['E_GroupExpertise']),
            'E_AreaExpertise' => json_encode($data['E_AreaExpertise']),
            'E_ResearchTitle' => json_encode($data['E_ResearchTitle']),
            'E_DurationStart' => json_encode($data['E_DurationStart']),
            'E_DurationEnd' => json_encode($data['E_DurationEnd']),
            'E_Agent' => json_encode($data['E_Agent']),
            'E_Role' => json_encode($data['E_Role']),
            'E_Cost' => json_encode($data['E_Cost']),
            'E_Status' => json_encode($data['E_Status']),
            'E_PublicationTitle' => json_encode($data['E_PublicationTitle']),
            'E_Authors' => json_encode($data['E_Authors']),
            'E_PublicationDate' => json_encode($data['E_PublicationDate']),
            'E_Source' => json_encode($data['E_Source']),
            'E_Volume' => json_encode($data['E_Volume']),
            'E_Pages' => json_encode($data['E_Pages']),
            'E_Publisher' => json_encode($data['E_Publisher']),
            'E_Link' => json_encode($data['E_Link']),
        ]);

        return redirect()->route('manage_expertdomain.MyExpertList')->with('success', 'Expert uploaded successfully.');
    }

    public function view(ExpertDomain $expertdomain)
    {
        return view('manage_expertdomain.ViewExpert', ['expertdomain' => $expertdomain]);
    }

    public function viewPublication($expertdomain, $publicationTitle)
    {
        $expertdomain = ExpertDomain::find($expertdomain);
        $publicationTitles = json_decode($expertdomain->E_PublicationTitle, true);
        $publication = array_search($publicationTitle, $publicationTitles);

        return view('manage_expertdomain.ViewPublication', ['expertdomain' => $expertdomain, 'publication' => $publication]);
    }

    public function edit(ExpertDomain $expertdomain)
    {
        return view('manage_expertdomain.EditExpert', ['expertdomain' => $expertdomain]);
    }

    public function update(Request $request, ExpertDomain $expertdomain)
    {
        $formType = $request->input('form_type');
        $data = [];

        if ($formType === 'profile') {
            $data = $request->validate([
                'E_Name' => 'required|string|max:255',
                'E_Title' => 'required|string|max:255',
                'E_Email' => 'required|email|max:255',
                'E_Position' => 'required|string|max:255',
                'E_Workplace' => 'required|string|max:255',
                'E_Qualification' => 'required|array',
                'E_Photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:24028',
                'E_CategoryExpertise' => 'nullable|string|max:255',
                'E_GroupExpertise' => 'nullable|array',
                'E_AreaExpertise' => 'nullable|array',
            ]);

            if ($request->hasFile('E_Photo')) {
                $picture = $request->file('E_Photo');
                $pictureName = time() . '.' . $picture->getClientOriginalExtension();
                $picture->move(public_path('uploads'), $pictureName);
                $data['E_Photo'] = $pictureName;
            }

            $expertdomain->update([
                'E_Name' => $data['E_Name'],
                'E_Title' => $data['E_Title'],
                'E_Email' => $data['E_Email'],
                'E_Position' => $data['E_Position'],
                'E_Workplace' => $data['E_Workplace'],
                'E_Qualification' => json_encode($data['E_Qualification']),
                'E_Photo' => $data['E_Photo'] ?? $expertdomain->E_Photo,
                'E_CategoryExpertise' => $data['E_CategoryExpertise'],
                'E_GroupExpertise' => json_encode($data['E_GroupExpertise']),
                'E_AreaExpertise' => json_encode($data['E_AreaExpertise']),
            ]);

        } elseif ($formType === 'research') {
            $data = $request->validate([
                'E_ResearchTitle' => 'required|array',
                'E_DurationStart' => 'required|array',
                'E_DurationEnd' => 'required|array',
                'E_Agent' => 'required|array',
                'E_Role' => 'required|array',
                'E_Cost' => 'required|array',
                'E_Status' => 'required|array',
            ]);

            $expertdomain->update([
                'E_ResearchTitle' => json_encode($data['E_ResearchTitle']),
                'E_DurationStart' => json_encode($data['E_DurationStart']),
                'E_DurationEnd' => json_encode($data['E_DurationEnd']),
                'E_Agent' => json_encode($data['E_Agent']),
                'E_Role' => json_encode($data['E_Role']),
                'E_Cost' => json_encode($data['E_Cost']),
                'E_Status' => json_encode($data['E_Status']),
            ]);

        } elseif ($formType === 'publication') {
            $data = $request->validate([
                'E_PublicationTitle' => 'required|array',
                'E_Authors' => 'required|array',
                'E_PublicationDate' => 'required|array',
                'E_Source' => 'nullable|array',
                'E_Volume' => 'nullable|array',
                'E_Pages' => 'nullable|array',
                'E_Publisher' => 'nullable|array',
                'E_Link' => 'required|array',
                'E_PublicationResearch' => 'nullable|array',

            ]);

            $expertdomain->update([
                'E_PublicationTitle' => json_encode($data['E_PublicationTitle']),
                'E_Authors' => json_encode($data['E_Authors']),
                'E_PublicationDate' => json_encode($data['E_PublicationDate']),
                'E_Source' => json_encode($data['E_Source']),
                'E_Volume' => json_encode($data['E_Volume']),
                'E_Pages' => json_encode($data['E_Pages']),
                'E_Publisher' => json_encode($data['E_Publisher']),
                'E_Link' => json_encode($data['E_Link']),
                'E_PublicationResearch' => json_encode($data['E_PublicationResearch'] ?? []),
            ]);

        }

        return redirect()->route('manage_expertdomain.MyExpertList')->with('success', 'Expert updated successfully.');
    }

    public function MyExpertList()
    {
        $userPlatinumID = auth()->user()->users->P_ID;
        $expertdomain = ExpertDomain::where('P_ID', $userPlatinumID)->paginate(10);
        return view('manage_expertdomain.MyExpertList', ['expertdomain' => $expertdomain]);
    }

    public function find(Request $request)
    {

        $query = $request->input('q');
        $type = $request->input('type');
        $expertdomain = collect();

        if ($query && in_array($type, ['name', 'research', 'publication', 'category', 'workplace'])) {
            switch ($type) {
                case 'name':
                    $expertdomain = ExpertDomain::where('E_Name', 'LIKE', "%{$query}%")->get();
                    break;
                case 'research':
                    $expertdomain = ExpertDomain::where('E_ResearchTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'publication':
                    $expertdomain = ExpertDomain::where('E_PublicationTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'category':
                    $expertdomain = ExpertDomain::where('E_CategoryExpertise', 'LIKE', "%{$query}%")->get();
                    break;
                case 'workplace':
                    $expertdomain = ExpertDomain::where('E_Workplace', 'LIKE', "%{$query}%")->get();
                    break;
            }
        }

        return view('manage_expertdomain.FindExpert', ['expertdomain' => $expertdomain]);
    }

    public function delete(ExpertDomain $expertdomain)
    {
        $expertdomain->delete();
        return redirect()->route('manage_expertdomain.MyExpertList')->with('success', 'Expert deleted successfully.');
    }

    public function SearchExpert()
    {
        return view('manage_expertdomain.MentorFindExpert');
    }

    public function search(Request $request)
    {

        $query = $request->input('q');
        $type = $request->input('type');
        $expertdomain = collect();

        if ($query && in_array($type, ['name', 'research', 'publication', 'category', 'workplace'])) {
            switch ($type) {
                case 'name':
                    $expertdomain = ExpertDomain::where('E_Name', 'LIKE', "%{$query}%")->get();
                    break;
                case 'research':
                    $expertdomain = ExpertDomain::where('E_ResearchTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'publication':
                    $expertdomain = ExpertDomain::where('E_PublicationTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'category':
                    $expertdomain = ExpertDomain::where('E_CategoryExpertise', 'LIKE', "%{$query}%")->get();
                    break;
                case 'workplace':
                    $expertdomain = ExpertDomain::where('E_Workplace', 'LIKE', "%{$query}%")->get();
                    break;
            }
        }

        return view('manage_expertdomain.MentorFindExpert', ['expertdomain' => $expertdomain]);
    }

    public function MentorViewExpert(ExpertDomain $expertdomain)
    {
        return view('manage_expertdomain.MentorViewExpert', ['expertdomain' => $expertdomain]);
    }

    public function MentorViewPublication($expertdomain, $publicationTitle)
    {
        $expertdomain = ExpertDomain::find($expertdomain);
        $publicationTitles = json_decode($expertdomain->E_PublicationTitle, true);
        $publication = array_search($publicationTitle, $publicationTitles);

        return view('manage_expertdomain.MentorViewPublication', ['expertdomain' => $expertdomain, 'publication' => $publication]);
    }
}
