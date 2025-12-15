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
</style>

<div class="form-container">
    <div class="form-title">Update Staff Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <form method="post" action="{{ route('profile.staff.update') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $staff->user_id }}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="S_name" class="form-control" value="{{ $staff->S_name }}">
            </div>
            <div class="form-group">
                <label for="ic">IC Number:</label>
                <input type="text" id="ic" name="S_IC" class="form-control" value="{{ $staff->S_IC }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="S_gender" class="form-control" value="{{ $staff->S_gender }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="S_email" class="form-control" value="{{ $staff->S_email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="S_phoneNum" class="form-control" value="{{ $staff->S_phoneNum }}">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="S_address" class="form-control" value="{{ $staff->S_address }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ url('/dashboard-staff') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection
