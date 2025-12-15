@extends('layouts/masterPlatinum')
@section('content')

<style>
    section {
    position: relative;
    min-height: 100px; 
    }

    .titleText {
        text-align: center;
        font-size: 30px;
        padding-top: 1rem;
    }

    .success-message {
        text-align: center;
        color: green;
        padding-bottom: 20px;
    }

    .container {
        border: 1px solid grey;
        background-color: #F9F9F9;
        max-width: 1000px;
        width: 100%;
        padding: 20px 50px;
        display: flex;
        flex-direction: column; 
        margin: auto;
        margin-bottom: 1rem;
    }

    th, td{
        text-align: center;
        height: 40px;
    }

    .myplatinum-th {
        padding-bottom: 12px;
        font-size: 17px;
    }


    .action-button {
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    width: 100px;
    margin: 0px 7px;
    padding: 3px 0px;
    color: white;
    border-radius: 5px;
    }

    .action-button:hover {
    background-color: grey;
    }

    .view {
    background-color: #04AA6D;
    }

    .edit {
    background-color: #007bff; 
    }   

    .delete {
    background-color: #c70000;
    }

    .action-buttons-container {
        display: flex;
        justify-content: center;
        align-items: center; 
    }
</style>

<section>
<div class="titleText"><b>Research Information</b></div>
<div class="success-message">
    @if(session()->has('success'))
        <div>
            {{ session('success')}}
        </div>
    @endif
  </div>

    <div class="container">
    <table>
        <tr>
            <th class="myexp-th" style="width: 10%;">No</th>
            <th class="myexp-th" style="width: 50%;">Research Information Title</th>
            <th class="myexp-th" style="width: 50%;">Action</th>
            </tr>
        <tbody>
        @php $counter = 1; @endphp
            @foreach ($data as $research)
            <tr>
                <td>{{$counter}}</td>
                <td>{{$research->RI_title}}</td>
                <td class="action-buttons-container">
                    <a href="{{ url('platinum/research/editResearch/' . $research->RI_ID) }}"><button class="action-button edit">Edit</button></a> 
                    <a href="{{ url('platinum/research/deleteResearch/' . $research->RI_ID) }}"><button class="action-button delete">Delete</button></a>
                    <a href="{{ url('platinum/research/viewResearch/' . $research->RI_ID) }}"><button class="action-button view">View</button></a></td>
                </td>
            </tr>
            @php $counter++; @endphp
            @endforeach
        </tbody>
        </div>
    </table>
</section>

@endsection
