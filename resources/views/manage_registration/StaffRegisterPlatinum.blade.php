@extends('layouts/masterStaff')
@section('content')

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    .form-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-required {
        color: red;
        font-size: 16px;
        text-align: center;
        margin-bottom: 10px;
    }

    .form-content {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select,
    .form-group radio {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .form-group button {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #444;
    }

    .form-group .radio-inline {
        display: inline-block;
        margin-right: 10px;
    }

    .form-group .radio-inline input {
        width: auto;
    }
</style>

<div class="form-container">
    <div class="form-title">Registration Platinum Form</div>
    <div class="form-content">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <p style="color:red; text-align:center;">{{$error}}</p>
                @endforeach
            </ul>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{url('staff/register/saveRegistration')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name: <span style="color: red;">*</span></label>
                <input type="text" id="name" name="P_Name" placeholder="Enter Platinum Name" required>
            </div>
            <div class="form-group">
                <label for="ic">Identity Card Number: <span style="color: red;">*</span></label>
                <input type="text" id="ic" name="P_IC" placeholder="Enter Platinum IC Number" required>
            </div>
            <div class="form-group">
                <label>Gender: <span style="color: red;">*</span></label><br>
                <label class="radio-inline"><input type="radio" id="female" name="P_Gender" value="Female" required> Female</label>
                <label class="radio-inline"><input type="radio" id="male" name="P_Gender" value="Male" required> Male</label>
            </div>
            <div class="form-group">
                <label for="religion">Religion: <span style="color: red;">*</span></label>
                <select id="religion" name="P_Religion" required>
                    <option value="">Select Religion</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Christian">Christian</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="race">Race: <span style="color: red;">*</span></label>
                <select id="race" name="P_Race" required>
                    <option value="">Select Race</option>
                    <option value="Malay">Malay</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Indian">Indian</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="citizenship">Citizenship: <span style="color: red;">*</span></label><br>
                <label class="radio-inline"><input type="radio" id="malaysian" name="P_Citizenship" value="Malaysian" required> Malaysian</label>
                <label class="radio-inline"><input type="radio" id="non_malaysian" name="P_Citizenship" value="Non_malaysian" required> Non-Malaysian</label>
            </div>
            <div class="form-group">
                <label for="address">Address: <span style="color: red;">*</span></label>
                <input type="text" id="address" name="P_Address" placeholder="Enter Platinum Address" required>
            </div>
            <div class="form-group">
                <label for="phonenum">Phone Number: <span style="color: red;">*</span></label>
                <input type="text" id="phonenum" name="P_PhoneNum" placeholder="Enter phone number" required>
            </div>
            <div class="form-group">
                <label for="email">Email: <span style="color: red;">*</span></label>
                <input type="text" id="email" name="P_Email" placeholder="Enter Platinum Email" required>
            </div>
            <div class="form-group">
                <label for="fb">Facebook Name: <span style="color: red;">*</span></label>
                <input type="text" id="fb" name="P_FBName" placeholder="Enter FB Name" required>
            </div>
            <div class="form-group">
                <label for="edulevel">Latest Education Level: <span style="color: red;">*</span></label>
                <select id="edulevel" name="P_EduLevel" required>
                    <option value="">Select Education Level</option>
                    <option value="SPM">SPM</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Master">Master</option>
                    <option value="PhD">PhD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edufield">Education Field: <span style="color: red;">*</span></label>
                <input type="text" id="edufield" name="P_EduField" placeholder="Enter Education Field" required>
            </div>
            <div class="form-group">
                <label for="eduinst">Education Institute: <span style="color: red;">*</span></label>
                <input type="text" id="eduinst" name="P_EduInst" placeholder="Enter Education Institute" required>
            </div>
            <div class="form-group">
                <label for="occupation">Occupation: <span style="color: red;">*</span></label>
                <input type="text" id="occupation" name="P_Occupation" placeholder="Enter Platinum Occupation" required>
            </div>
            <div class="form-group">
                <label for="sponsor">Study Sponsorship: <span style="color: red;">*</span></label>
                <input type="text" id="sponsor" name="P_Stud_Sponsor" placeholder="Enter Platinum Study Sponsorship" required>
            </div>
            <div class="form-group">
                <label for="batch">Batch: <span style="color: red;">*</span></label>
                <input type="text" id="batch" name="P_Batch" placeholder="Enter Platinum Batch Number" required>
            </div>
            <div class="form-group">
                <label for="referral">Referral Number: <span style="color: red;">*</span></label>
                <input type="text" id="referral" name="P_Referral" placeholder="Enter Referral Number" required>
            </div>
            <div class="form-group">
                <label for="refname">Referral Name: <span style="color: red;">*</span></label>
                <input type="text" id="refname" name="P_RefName" placeholder="Enter Referral Name" required>
            </div>
            <div class="form-group">
                <label for="refbatch">Referral Batch: <span style="color: red;">*</span></label>
                <input type="text" id="refbatch" name="P_RefBatch" placeholder="Enter Referral Batch" required>
            </div>
            <div class="form-group">
                <label for="date">Date of Application: <span style="color: red;">*</span></label>
                <input type="date" id="date" name="P_DOApp" placeholder="Choose Date" required>
            </div>
            <div class="form-group">
                <label for="picture">Personal Picture: <span style="color: red;">*</span></label>
                <input type="file" id="picture" name="P_Picture" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <a href ="{{url('/dashboard-staff')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>

@endsection


