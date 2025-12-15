@extends('layouts.masterMentor')

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

    th, td {
        text-align: center;
        height: 40px;
    }

    .myplatinum-th {
        padding-bottom: 12px;
        font-size: 17px;
    }

    .action-button {
        border: 2px solid rgba(255, 255, 255, 0.733);
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        width: 100px;
        margin: 0px 7px;
        padding: 3px 0px;
        color: white;
        background-color: black;
        border-radius: 10px;
    }

    .action-button:hover {
        background-color: grey;
    }

    .action-buttons-container {
        display: flex;
        justify-content: center;
        align-items: center; 
    }
</style>

<section>
    <div class="titleText"><b>List of Users</b></div>
    <div class="success-message">
        @if(session()->has('success'))
            <div>
                {{ session('success')}}
            </div>
        @endif
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th class="myexp-th" style="width: 10%;">No.</th>
                    <th class="myexp-th" style="width: 30%;">User's Name</th>
                    <th class="myexp-th" style="width: 20%;">Type</th>
                    <th class="myexp-th" style="width: 40%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp
                @foreach($combine as $user)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>
                            @if($user->type == 'staff')
                                {{ $user->S_name }}
                            @elseif($user->type == 'platinum')
                                {{ $user->P_Name }}
                            @else
                                {{ $user->M_name }}
                            @endif
                        </td>
                        <td>{{ ucfirst($user->type) }}</td>
                        <td class="action-buttons-container">
                            @if($user->type == 'staff')
                                <a href="{{ url('mentor/profile/viewStaff/' . $user->S_ID) }}">
                                    <button class="action-button">View</button>
                                </a>
                            @elseif($user->type == 'platinum')
                                <a href="{{ url('mentor/profile/viewRegister/' . $user->P_ID) }}">
                                    <button class="action-button">View</button>
                                </a>
                            @else
                                <a href="{{ url('mentor/profile/viewMentor/' . $user->M_ID) }}">
                                    <button class="action-button">View</button>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @php $counter++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection