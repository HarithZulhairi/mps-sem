@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/SearchPublication.css') }}" rel="stylesheet">

<div class="searchText">
    <b>Search Publication</b>
</div>

<div class="search-container">
    <div class="tabs">
        <div class="tab active" data-tab="titles">Titles</div>
        <div class="tab" data-tab="authors">Authors</div>
        <div class="tab-indicator"></div>
    </div>
    
    <form id="searchForm" method="GET" action="{{ route('manage_publication.PlatinumSearchPublication') }}">
        <div class="search-box">
            <i class="fas fa-search fa-2x" aria-hidden="true"></i>
            <input type="hidden" name="type" id="searchType" value="titles">
            <input type="search" name="query" placeholder="Enter title that you're interested" id="searchInput" style="border: 1px solid grey;">
            <input type="submit" value="Search">
        </div>
    </form>
</div>

@if(request()->has('query'))
<div class="search-results" id="searchResults">
    @if($publications->isEmpty())
        <p style="padding: 20px 0px 0px 0px">No results found.</p>
    @else
        @foreach($publications as $publication)
            <div class="result">
                <h3>{{ $publication->Pb_title }}</h3>
                <div class="doi-date">
                    <p class="downloadable">Downloadable</p>
                    <p class="publication-type {{ strtolower($publication->Pb_type) }}">{{ $publication->Pb_type }}</p>
                    <p class="date-publication">{{ (new DateTime($publication->Pb_date))->format('j F Y') }}</p>
                    <p class="DOI-publication">DOI: {{ $publication->Pb_DOI }}</p>
                </div>
                <p>
                    {{ $publication->Pb_authors }}
                    @if($publication->Pb_belongs == "Expert")
                        <span class="expert-domain"> (Expert Domain)</span>
                    @endif
                </p>
                <a href="{{ route('manage_publication.PlatinumViewPublication', $publication->Pb_ID) }}" >
                    <button class="view-publication">View Publication</button>
                </a>
            </div>
        @endforeach
    @endif
</div>
@endif

@endsection
