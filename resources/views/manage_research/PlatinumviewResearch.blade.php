@extends('layouts.masterPlatinum')

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

</style>

<div class="form-container">
    <div class="form-title">Research Information Details</div>
    <div class="form-content">
        <div class="form-group">
            <h6 style="display: inline;">Title: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_title }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Authors: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_author }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Abstract: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_abstract }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Research Area: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_area }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Objective: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_objective }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Methodology: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_methodology }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Research Background: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_background }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Timeline: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_timeline }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Budget: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_budget }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Outcome: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_outcome }}</p>
        </div>
        <div class="form-group">
            <h6 style="display: inline;">Reference: <span style="color: red;"></span></h6>
            <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $data->RI_reference }}</p>
        </div>
        <div class="form-group">
            <a href="{{ url('platinum/research/editResearch/' . $data->RI_ID) }}" class="btn btn-primary">Edit</a>
            <a href="{{ url('platinum/research/deleteResearch/' . $data->RI_ID) }}" class="btn btn-danger">Delete</a>
            <a href ="{{url('platinum/research/listResearch')}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>

@endsection



