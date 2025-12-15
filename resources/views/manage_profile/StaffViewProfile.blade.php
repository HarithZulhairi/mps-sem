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
</style>

<div class="form-container">
    <div class="form-title">MY PROFILE</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif

        @if($staff)
        <form method="post" action="{{ route('profile.staff.update') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $staff->user_id }}">
            <div class="form-group">
                <h6 style="display: inline;">Name: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;">{{ $staff->S_name }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">IC Number: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;">{{ $staff->S_IC }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Gender: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;">{{ $staff->S_gender }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Email: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;" >{{ $staff->S_email }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Phone Number: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;">{{ $staff->S_phoneNum }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Address: <span style="color: red;"></span></h6>
                <p class="form-control-static" style="display: inline; margin-left: 10px;">{{ $staff->S_address }}</p>
            </div>
            <div class="form-group">
                <a href="{{ url('/dashboard-staff') }}" class="btn btn-danger">Back</a>
                <a href="{{ route('profile.staff.edit', ['id' => $staff->user_id]) }}" class="btn btn-primary float-right">Update Profile</a>
            </div>
        </form>
        @else
        <div class="alert alert-danger" role="alert">
            Staff not found.
        </div>
        @endif
    </div>
</div>

@endsection