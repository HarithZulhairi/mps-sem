@extends('layouts/masterPlatinum')
@section('content')

<style>
    .search-container {
        text-align: center;
        margin-top: 50px;
    }

    .search-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .search-form input[type="text"], .search-form select {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-form button[type="submit"] {
        cursor: pointer;
        background-color: #75CE9F;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .search-form button[type="submit"]:hover {
        background-color: #5aad7e;
    }

    .search-result {
        border: 1px solid grey;
        border-radius: 5px;
        background-color: #F9F9F9;
        max-width: 1000px;
        width: 90%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        margin: auto;
        margin-top: 3rem;
        margin-bottom: 1rem;
    }

    .search-result .result {
        padding: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #ccc;
        transition: background-color 0.3s ease;
    }

    .search-result .result:hover {
        background-color: #e6f7ff;
    }

    .result h3 {
        margin-bottom: 5px;
        font-size: 20px;
    }

    .result p {
        margin: 0;
        color: #666;
    }

    .intro-text, .main-text {
        text-align: center;
        margin: auto;
    }

    .intro-text {
        font-style: italic;
        font-size: 25px;
        margin-bottom: 50px;
    }

    .main-text {
        font-size: 18px;
        margin-bottom: 30px;
        font-style: italic;
    }

    @media (max-width: 600px) {
        .search-form input[type="text"], .search-form select {
            width: 100%;
        }

        .search-result {
            width: 100%;
        }
    }
</style>

<div class="intro-text">
    <p>FIND EXPERTISE, CONNECT EFFORTLESSLY, EXCEL BEYOND LIMITS</p>
</div>

<div class="main-text">
    <p>Here's where you discover experts in your field, allowing</p>
    <p>you to interact directly with them, and gain valuable</p>
    <p>knowledge to your needs</p>
</div>

<div class="search-container">
    <div class="search-form">
        <form action="{{ route('manage_expertdomain.FindExpert') }}" method="get">
            <input type="text" name="q" placeholder="Search...">
            <select name="type">
                <option value="name">Name</option>
                <option value="workplace">Workplace</option>
                <option value="category">Category</option>
                <option value="research">Research</option>
                <option value="publication">Publication</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>
</div>

@if(request()->has('q'))
<div class="search-result" id="searchResult">
    @if($expertdomain->isEmpty())
        <p style="padding: 20px 0;">No results found.</p>
    @else
        @foreach($expertdomain as $expert)
            <div class="result">
                <h3><a href="{{route('manage_expertdomain.ViewExpert', $expert->E_ID) }}">{{ $expert->E_Title}} {{ $expert->E_Name }}</a></h3>
                @if($expert->E_Workplace)
                    <p><strong>Workplace:</strong> {{ $expert->E_Workplace }}</p>
                @endif
                @if($expert->E_CategoryExpertise)
                    <p><strong>Category:</strong> {{ $expert->E_CategoryExpertise }}</p>
                @endif
                @if($expert->E_ResearchTitle)
                    @php $researchTitle = json_decode($expert->E_ResearchTitle);
                    @endphp
                        <p><strong>Research:</strong> {{ $researchTitle[0] }}</p>
                @endif
                @if($expert->E_PublicationTitle)
                    @php $publicationTitles = json_decode($expert->E_PublicationTitle); 
                    @endphp
                    <p><strong>Publication:</strong> {{ $publicationTitles[0] }}</p>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endif

@endsection
