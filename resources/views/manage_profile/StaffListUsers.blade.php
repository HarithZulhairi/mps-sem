@extends('layouts.masterStaff')

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

    .filter-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .filter-button {
        border: 1px solid #ccc;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        padding: 10px 20px;
        color: black;
        background-color: white;
        border-radius: 5px;
        margin: 0 5px;
    }

    .filter-button:hover {
        background-color: #eee;
    }

    .filter-button.active {
        background-color: #ccc;
    }

    .filter-dropdown {
        margin-left: 20px;
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

    <div class="filter-buttons">
        <a href="{{ url('staff/profile/staffList?filter=') }}" class="filter-button {{ request()->query('filter') == '' ? 'active' : '' }}">All</a>
        <a href="{{ url('staff/profile/staffList?filter=platinum') }}" class="filter-button {{ request()->query('filter') == 'platinum' ? 'active' : '' }}">Platinum</a>
        <a href="{{ url('staff/profile/staffList?filter=staff') }}" class="filter-button {{ request()->query('filter') == 'staff' ? 'active' : '' }}">Staff</a>
        <a href="{{ url('staff/profile/staffList?filter=mentor') }}" class="filter-button {{ request()->query('filter') == 'mentor' ? 'active' : '' }}">Mentor</a>

        @if(request()->query('filter') == 'platinum')
            <div class="filter-dropdown">
                <form action="{{ url('staff/profile/staffList') }}" method="GET">
                    <input type="hidden" name="filter" value="platinum">
                    <select name="university" onchange="this.form.submit()">
                        <option value="">All Universities</option>
                        @foreach($universities as $university)
                            <option value="{{ $university }}" {{ request()->query('university') == $university ? 'selected' : '' }}>{{ $university }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        @endif
    </div>

    @if(request()->query('filter') == 'platinum' && request()->query('university'))
        <div class="text-center mb-3">
            <a href="{{ url('staff/profile/report?university=' . request()->query('university')) }}" class="btn btn-primary">Generate Report</a>
        </div>
    @endif

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
                @foreach($combined as $user)
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
                                <a href="{{ url('staff/profile/viewStaff/' . $user->S_ID) }}">
                                    <button class="action-button">View</button>
                                </a>
                            @elseif($user->type == 'platinum')
                                <a href="{{ url('staff/profile/viewRegister/' . $user->P_ID) }}">
                                    <button class="action-button">View</button>
                                </a>
                            @else
                                <a href="{{ url('staff/profile/viewMentor/' . $user->M_ID) }}">
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