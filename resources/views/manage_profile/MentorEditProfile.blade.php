@extends('layouts/masterMentor')
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
    <div class="form-title">Update Mentor Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <form method="post" action="{{ route('profile.mentor.update') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $mentor->user_id }}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="M_name" class="form-control" value="{{ $mentor->M_name }}">
            </div>
            <div class="form-group">
                <label for="ic">IC Number:</label>
                <input type="text" id="ic" name="M_IC" class="form-control" value="{{ $mentor->M_IC }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="M_gender" class="form-control" value="{{ $mentor->M_gender }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="M_email" class="form-control" value="{{ $mentor->M_email }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="M_phoneNum" class="form-control" value="{{ $mentor->M_phoneNum }}">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="M_address" class="form-control" value="{{ $mentor->M_address }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ url('/dashboard-mentor') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection