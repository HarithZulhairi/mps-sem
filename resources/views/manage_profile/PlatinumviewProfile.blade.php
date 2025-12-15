@extends('layouts/masterPlatinum')
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
    .form-group select {
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

    .profile-picture {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .profile-picture img {
        border-radius: 50%;
        max-width: 150px;
        max-height: 150px;
    }

    .form-content h4 {
        margin-top: 20px;
    }
</style>

<div class="form-container">
    <div class="form-title">My Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif

        @if($register)
        <div class="profile-picture">
            <img src="{{ asset('uploads/' . $register->P_Picture) }}" alt="Profile Picture">
        </div>
        <form method="post" action="{{url('saveRegistration')}}">
            @csrf
            <h4>Personal Details</h4>
            <div class="form-group">
                <h6 style="display: inline;">Name: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Name }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Identity Card Number: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_IC }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Gender: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Gender }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Religion: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Religion }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Race: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Race }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Citizenship: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Citizenship }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Address: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Address }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Phone Number: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_PhoneNum }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Email: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Email }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Facebook Name: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_FBName }}</p>
            </div>
            <h4>Education Information</h4>
            <div class="form-group">
                <h6 style="display: inline;">Latest Education Level: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_EduLevel }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Education Field: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_EduField }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Education Institute: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_EduInst }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Occupation: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Occupation }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Study Sponsorship: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Stud_Sponsor }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Batch: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Batch }}</p>
            </div>
            <h4>Referral Information</h4>
            <div class="form-group">
                <h6 style="display: inline;">Referral Number: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Referral }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Referral Name: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_RefName }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Referral Batch: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_RefBatch }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Date of Application: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_DOApp }}</p>
            </div>
            <span>
                <a href ="{{url('/dashboard-platinum')}}" class="btn btn-danger">Back</a>
                <a href="{{ route('manage_profile.PlatinumEditProfile', ['id' => $register->P_ID]) }}" class="btn btn-primary float-right">Update Profile</a>
            </span>
        </form>
        @else
        <div class="alert alert-danger" role="alert">
            User not found.
        </div>
        @endif
    </div>
</div>

@endsection

