
@extends('layouts/masterPlatinum')
@section('content')

<style>
    section {
        position: relative;
        min-height: 100px;
    }

    .title {
        text-align: center;
        font-size: 30px;
        padding-top: 1rem;
    }

    .asterisk {
        text-align: center;
        color: red;
        font-size: 15px;
    }

    .container {
        border: 1px solid grey;
        background-color: #F9F9F9;
        max-width: 700px;
        width: 100%;
        padding: 20px 50px;
        display: flex;
        flex-direction: column;
        margin: auto;
        margin-bottom: 1rem;
    }

    .upload-button {
        width: 200px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        border: none;
        border-radius: 8px;
        margin: 5px;

    }

    .upload-button:hover {
        background-color: #0056b3;
    }

    .agreement-box {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .agreement-box input[type="checkbox"] {
        width: 30px;
        height: 19px;
    }

    .agreement-box label {
        font-size: 14px;
        line-height: 1.5;
        font-weight: 500;
    }

    .edit-button {
        display: flex;
        justify-content: space-around;
    }

    .edit-button input[type="submit"]:hover {
        background-color: #218c65;
    }

    .edit-button input[type="submit"] {
        font-weight: bold;
        width: 200px;
        padding: 10px 20px;
        background-color: #04AA6D;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        position: center;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 40px;
            border: 1px solid #888;
            width: 80%;
            max-height: 80vh;
            overflow-y: auto;
        }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script>
    function addQualification() {
        const container = document.getElementById('qualifications');
        const newField = document.createElement('div');
        newField.classList.add('expertqualification');
        newField.innerHTML = `
            <input type="text" name="E_Qualification[]" placeholder="Enter expert's qualification" style="width:100%; padding: 6px 10px;"><br><br>
        `;
        container.appendChild(newField);
    }

    function addGroupofExpertise() {
        const container = document.getElementById('group');
        const newField = document.createElement('div');
        newField.classList.add('groupexpertise');
        newField.innerHTML = `
            <input type="text" name="E_GroupExpertise[]" placeholder="Enter expert's group of expertise" style="width:100%; padding: 6px 10px;"><br><br>
        `;
        container.appendChild(newField);
    }

    function addAreaofExpertise() {
        const container = document.getElementById('area');
        const newField = document.createElement('div');
        newField.classList.add('areaexpertise');
        newField.innerHTML = `
            <input type="text" name="E_AreaExpertise[]" placeholder="Enter expert's area of expertise" style="width:100%; padding: 6px 10px;"><br><br>
        `;
        container.appendChild(newField);
    }

    function addResearch() {
        const container = document.getElementById('research');
        const newField = document.createElement('div');
        newField.classList.add('researchtitle', 'researchduration', 'researchagent', 'researchrole', 'researchcost', 'researchstatus');
        newField.innerHTML = `
            <br><br>
            <label for="researchtitle">Research Title:</label><span style="color: red">*</span><br>
            <input type="text" name="E_ResearchTitle[]" placeholder="Enter expert's research title" style="width:100%; padding: 6px 10px;"><br><br>

            <label>Duration: <span style="color: red">*</span></label><br>
            <input type="date" name="E_DurationStart[]"> - <input type="date" name="E_DurationEnd[]"><br><br>

            <label for="agent">Agent: </label><span style="color: red">*</span><br>
            <input type="text" name="E_Agent[]" placeholder="Enter expert's agent" style="width:100%; padding: 6px 10px;"><br><br>

            <label>Role: <span style="color: red">*</span></label><br>
            <select id="E_ResearchRole" name="E_Role[]" style="width: 30%; padding: 6px;">
                <option value="leader">Leader</option>
                <option value="member">Member</option>
            </select><br><br>

            <label for="cost">Cost: </label><span style="color: red">*</span><br>
            <label>RM </label>
            <input type="text" name="E_Cost[]" placeholder="Enter expert's research cost" style="padding: 6px 10px;"><br><br>

            <label>Status: <span style="color: red">*</span></label><br>
            <select id="E_ResearchStatus" name="E_Status[]" style="width: 30%; padding: 6px;">
                <option value="ongoing">On-going</option>
                <option value="none">-</option>
            </select>
        `;
        container.appendChild(newField);
    }

    function addPublication() {
        const container = document.getElementById('publication');
        const newField = document.createElement('div');
        newField.classList.add('publicationtitle', 'publicationauthors', 'publicationdate', 'publicationsource', 'publicationvolume', 'publicationpages', 'publicationpublisher', 'publicationlink');
        newField.innerHTML = `
            <br><br>
            <label for="publicationtitle">Publication Title: </label><span style="color: red">*</span><br>
            <input type="text" name="E_PublicationTitle[]" placeholder="Enter expert's publication title" style="width:100%; padding: 6px 10px;"><br><br>

            <label for="publicationauthors">Authors: </label><span style="color: red">*</span><br>
            <input type="text" name="E_Authors[]" placeholder="Enter expert's publication authors" style="width:100%; padding: 6px 10px;"><br><br>

            <label>Publication Date: <span style="color: red">*</span></label><br>
            <input type="date" name="E_PublicationDate[]"><br><br>

            <label for="publicationsource">Source: </label><br>
            <input type="text" name="E_Source[]" placeholder="Enter expert's publication source" style="width:100%; padding: 6px 10px;"><br><br>

            <label for="publicationvolume">Volume: </label><br>
            <input type="text" name="E_Volume[]" placeholder="Enter expert's publication volume" style="width:100%; padding: 6px 10px;"><br><br>

            <label for="publicationpages">Pages: </label<br>
            <input type="text" name="E_Pages[]" placeholder="Enter expert's publication pages" style="width:100%; padding: 6px 10px;"><br><br>

            <label for="publicationpublisher">Publisher: </label><br>
            <input type="text" name="E_Publisher[]" placeholder="Enter expert's publication publisher" style="width:100%; padding: 6px 10px;"><br><br>

            <label for="publicationlink">Publication Link:</label><span style="color: red">*</span><br>
            <input type="url" name="E_Link[]" placeholder="Enter expert's publication link" style="width:100%; padding: 6px 10px;"><br><br>
        `;
        container.appendChild(newField);
    }

    function updateFileName(input) {
        const fileName = input.files[0]?.name || "";
        document.getElementById('file_name').innerText = fileName;
    }
</script>

<section>
<div class="title"><b>Edit Expert Information</b></div>
  <div style="text-align: center; color: red;">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </ul>
    @endif
  </div>
  <div class="container">
    <div class="edit-button">
        <button class="upload-button" onclick="openModal('profileModal')">Edit Profile</button>
        <button class="upload-button" onclick="openModal('researchModal')">Edit Research</button>
        <button class="upload-button" onclick="openModal('publicationModal')">Edit Publication</button>
    </div>
  </div>

  <div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('profileModal')">&times;</span>
        <form method="post" action="{{route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="profile">
            <div class="expertname">
                <label for="name">Name:</label><span style="color: red">*</span><br>
                <input type="text" name="E_Name" value="{{ old('E_Name', $expertdomain->E_Name) }}" placeholder="Enter expert's name" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="experttitle">
                <label for="title">Title:</label><span style="color: red">*</span><br>
                <input type="text" name="E_Title" value="{{ old('E_Title', $expertdomain->E_Title) }}" placeholder="Enter expert's title" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="expertemail">
                <label for="email">Email:</label><span style="color: red">*</span><br>
                <input type="email" name="E_Email" value="{{ old('E_Email', $expertdomain->E_Email) }}" placeholder="Enter expert's email" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="expertposition">
                <label for="position">Permanent Position:</label><span style="color: red">*</span><br>
                <input type="text" name="E_Position" value="{{ old('E_Position', $expertdomain->E_Position) }}" placeholder="Enter expert's position" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="expertworkplace">
                <label for="workplace">Workplace:</label><span style="color: red">*</span><br>
                <input type="text" name="E_Workplace" value="{{ old('E_Workplace', $expertdomain->E_Workplace) }}" placeholder="Enter expert's workplace" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="expertqualification" id="qualifications">
                <label for="qualification">Qualification:</label><span style="color: red">*</span><br>
                @foreach(json_decode($expertdomain->E_Qualification, true) as $qualification)
                    <input type="text" name="E_Qualification[]" value="{{ $qualification }}" placeholder="Enter expert's qualification" style="width:100%; padding: 6px 10px;"><br><br>
                @endforeach
            </div>
            <a href="javascript:void(0);" onclick="addQualification()">+ Add another qualification</a><br><br>
            <div class="expertphoto">
                <label for="photo">Expert's Picture: <span style="color: red">*</span></label><br>
                <input type="file" id="E_PhotoUpload" name="E_Photo" style="display: none;" onchange="updateFileName(this)">
                <button type="button" class="upload-button" onclick="document.getElementById('E_PhotoUpload').click()">Upload Photo</button>
                <p id="file_name">{{ $expertdomain->E_Photo }}</p>
            </div>
            <h3>Expert Field</h3>
            <div class="categoryexpertise">
                <label for="category">Category of Expertise:</label><br>
                <input type="text" name="E_CategoryExpertise" value="{{ old('E_CategoryExpertise', $expertdomain->E_CategoryExpertise) }}" placeholder="Enter expert's category of expertise" style="width:100%; padding: 6px 10px;"><br><br>
            </div>
            <div class="groupexpertise" id="group">
                <label for="group">Group of Expertise:</label><br>
                @foreach(json_decode($expertdomain->E_GroupExpertise, true) as $group)
                    <input type="text" name="E_GroupExpertise[]" value="{{ $group }}" placeholder="Enter expert's group of expertise" style="width:100%; padding: 6px 10px;"><br><br>
                @endforeach
            </div>
            <a href="javascript:void(0);" onclick="addGroupofExpertise()">+ Add another group of expertise</a><br><br>
            <div class="areaexpertise" id="area">
                <label for="area">Area of Expertise:</label><br>
                @foreach(json_decode($expertdomain->E_AreaExpertise, true) as $area)
                    <input type="text" name="E_AreaExpertise[]" value="{{ $area }}" placeholder="Enter expert's area of expertise" style="width:100%; padding: 6px 10px;"><br><br>
                @endforeach
            </div>
            <a href="javascript:void(0);" onclick="addAreaofExpertise()">+ Add another area of expertise</a><br><br>
            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement">
                <label for="agreement" style="margin-bottom: 0;">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span style="color: red">*</span></label>
            </div><br><br>
            <div class="edit-button">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
  </div>

  <div id="researchModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('researchModal')">&times;</span>
        <form method="post" action="{{route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="research">
            <h3>Expert Research</h3>
            <div id="research">
                @foreach(json_decode($expertdomain->E_ResearchTitle, true) as $index => $researchTitle)
                    <div class="researchtitle">
                        <label for="researchtitle">Research Title:</label><span style="color: red">*</span><br>
                        <input type="text" name="E_ResearchTitle[]" value="{{ $researchTitle }}" placeholder="Enter expert's research title" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="researchduration">
                        <label>Duration: <span style="color: red">*</span></label><br>
                        <input type="date" name="E_DurationStart[]" value="{{ json_decode($expertdomain->E_DurationStart, true)[$index] }}"> - <input type="date" name="E_DurationEnd[]" value="{{ json_decode($expertdomain->E_DurationEnd, true)[$index] }}"><br><br>
                    </div>
                    <div class="researchagent">
                        <label for="agent">Agent: </label><span style="color: red">*</span><br>
                        <input type="text" name="E_Agent[]" value="{{ json_decode($expertdomain->E_Agent, true)[$index] }}" placeholder="Enter expert's agent" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="researchrole">
                        <label>Role: <span style="color: red">*</span></label><br>
                        <select id="E_ResearchRole" name="E_Role[]" style="width: 30%; padding: 6px;">
                            <option value="leader" {{ json_decode($expertdomain->E_Role, true)[$index] == 'leader' ? 'selected' : '' }}>Leader</option>
                            <option value="member" {{ json_decode($expertdomain->E_Role, true)[$index] == 'member' ? 'selected' : '' }}>Member</option>
                        </select>
                    </div><br>
                    <div class="researchcost">
                        <label for="cost">Cost: </label><span style="color: red">*</span><br>
                        <label>RM </label>
                        <input type="text" name="E_Cost[]" value="{{ json_decode($expertdomain->E_Cost, true)[$index] }}" placeholder="Enter expert's research cost" style="padding: 6px 10px;"><br><br>
                    </div>
                    <div class="researchstatus">
                        <label>Status: <span style="color: red">*</span></label><br>
                        <select id="E_ResearchStatus" name="E_Status[]" style="width: 30%; padding: 6px;">
                            <option value="ongoing" {{ json_decode($expertdomain->E_Status, true)[$index] == 'ongoing' ? 'selected' : '' }}>On-going</option>
                            <option value="none" {{ json_decode($expertdomain->E_Status, true)[$index] == 'none' ? 'selected' : '' }}>-</option>
                        </select>
                    </div>
                @endforeach
            </div><br>
            <a href="javascript:void(0);" onclick="addResearch()">+ Add another research</a><br><br>
            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement">
                <label for="agreement" style="margin-bottom: 0;">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span style="color: red">*</span></label>
            </div><br><br>
            <div class="edit-button">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
  </div>

  <div id="publicationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('publicationModal')">&times;</span>
        <form method="post" action="{{route('manage_expertdomain.UpdateExpert', ['expertdomain' => $expertdomain->E_ID])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="form_type" value="publication">
            <h3>Expert Publication</h3>
            <div id="publication">
                @foreach(json_decode($expertdomain->E_PublicationTitle, true) as $index => $publicationTitle)
                    <div class="publicationtitle">
                        <label for="publicationtitle">Publication Title: </label><span style="color: red">*</span><br>
                        <input type="text" name="E_PublicationTitle[]" value="{{ $publicationTitle }}" placeholder="Enter expert's publication title" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationauthors">
                        <label for="publicationauthors">Authors: </label><span style="color: red">*</span><br>
                        <input type="text" name="E_Authors[]" value="{{ json_decode($expertdomain->E_Authors, true)[$index] }}" placeholder="Enter expert's publication authors" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationdate">
                        <label>Publication Date: <span style="color: red">*</span></label><br>
                        <input type="date" name="E_PublicationDate[]" value="{{ json_decode($expertdomain->E_PublicationDate, true)[$index] }}"><br><br>
                    </div>
                    <div class="publicationsource">
                        <label for="publicationsource">Source: </label><br>
                        <input type="text" name="E_Source[]" value="{{ json_decode($expertdomain->E_Source, true)[$index] }}" placeholder="Enter expert's publication source" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationvolume">
                        <label for="publicationvolume">Volume: </label><br>
                        <input type="text" name="E_Volume[]" value="{{ json_decode($expertdomain->E_Volume, true)[$index] }}" placeholder="Enter expert's publication volume" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationpages">
                        <label for="publicationpages">Pages: </label><br>
                        <input type="text" name="E_Pages[]" value="{{ json_decode($expertdomain->E_Pages, true)[$index] }}" placeholder="Enter expert's publication pages" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationpublisher">
                        <label for="publicationpublisher">Publisher: </label><br>
                        <input type="text" name="E_Publisher[]" value="{{ json_decode($expertdomain->E_Publisher, true)[$index] }}" placeholder="Enter expert's publication publisher" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                    <div class="publicationlink">
                        <label for="publicationlink">Publication Link:</label><span style="color: red">*</span><br>
                        <input type="url" name="E_Link[]" value="{{ json_decode($expertdomain->E_Link, true)[$index] }}" placeholder="Enter expert's publication link" style="width:100%; padding: 6px 10px;"><br><br>
                    </div>
                @endforeach
            </div>
            <a href="javascript:void(0);" onclick="addPublication()">+ Add another publication</a><br><br>
            <div class="agreement-box">
                <input type="checkbox" id="agreement" name="agreement" value="agreement">
                <label for="agreement" style="margin-bottom: 0;">I confirm that the information provided in my expert profile is accurate. I understand and agree to comply with the Upload Conditions. <span style="color: red">*</span></label>
            </div><br><br>
            <div class="edit-button">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
  </div>
</section>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
        }
    }
</script>

@endsection
