@extends('layouts.masterStaff')

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

    .form-group h6 {
        display: inline;
    }

    .form-group p {
        display: inline;
        margin-left: 10px;
    }
</style>

<div class="form-container">
    <div class="form-title">Staff Profile</div>
    <div class="form-content">
        <div class="form-group">
            <h6>Name:</h6>
            <p>{{ $staff->S_name }}</p>
        </div>
        <div class="form-group">
            <h6>Identity Card Number:</h6>
            <p>{{ $staff->S_IC }}</p>
        </div>
        <div class="form-group">
            <h6>Gender:</h6>
            <p>{{ $staff->S_gender }}</p>
        </div>
        <div class="form-group">
            <h6>Address:</h6>
            <p>{{ $staff->S_address }}</p>
        </div>
        <div class="form-group">
            <h6>Phone Number:</h6>
            <p>{{ $staff->S_phoneNum }}</p>
        </div>
        <div class="form-group">
            <h6>Email:</h6>
            <p>{{ $staff->S_email }}</p>
        </div>
        <a href="{{ url('staff/profile/staffList') }}" class="btn btn-danger">Back</a>
    </div>
</div>

@endsection