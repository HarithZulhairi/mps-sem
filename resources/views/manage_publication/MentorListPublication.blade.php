@extends('layouts.masterMentor')

@section('content')

<link href="{{ asset('style_manage_publication/ListPublication.css') }}" rel="stylesheet">

<section>
    <div class="titleText"><b>List of Publications</b></div>
    <div class="success-message">
        @if(session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
    </div>

    <div class="search-filter-box">
        <!-- Search Bar and Options -->
        <div class="search-container">
            <form method="GET" action="{{ route('manage_publication.MentorListPublication') }}">
                <i class="fas fa-search fa-2x" aria-hidden="true"></i>
                <input type="text" name="search_query" placeholder="Search..." value="{{ request('search_query') }}">
                <select name="search_type">
                    <option value="title" {{ request('search_type') == 'title' ? 'selected' : '' }}>Title</option>
                    <option value="authors" {{ request('search_type') == 'authors' ? 'selected' : '' }}>Authors</option>
                </select>

                <!-- Filter Options -->
                <div class="filter-container">
                    <label for="publication_type">Publication Type:</label>
                    <select name="publication_type" id="publication_type">
                        <option value="">All</option>
                        <option value="article" {{ request('publication_type') == 'article' ? 'selected' : '' }}>Article</option>
                        <option value="journal" {{ request('publication_type') == 'journal' ? 'selected' : '' }}>Journal</option>
                        <option value="conference" {{ request('publication_type') == 'conference' ? 'selected' : '' }}>Conference Paper</option>
                        <option value="book" {{ request('publication_type') == 'book' ? 'selected' : '' }}>Book</option>
                    </select>

                    <label for="ownership_type">Ownership:</label>
                    <select name="ownership_type" id="ownership_type">
                        <option value="">All</option>
                        <option value="expert" {{ request('ownership_type') == 'expert' ? 'selected' : '' }}>Expert Only</option>
                        <option value="self" {{ request('ownership_type') == 'self' ? 'selected' : '' }}>Self Publication</option>
                    </select>

                    <label for="publication_year">Publication year:</label>
                    <select name="publication_year" id="publication_year">
                        <option value="">All</option>
                        @foreach($publicationYears as $pbYear)
                            <option value="{{ $pbYear }}" {{ request('publication_year') == $pbYear ? 'selected' : '' }}>{{ $pbYear }}</option>
                        @endforeach
                    </select>

                    <label for="publication_uni">University:</label>
                    <select name="publication_uni" id="publication_uni">
                        <option value="">All</option>
                        @foreach($platinumEduInsts as $p_edu)
                            <option value="{{ $p_edu }}" {{ request('publication_uni') == $p_edu ? 'selected' : '' }}>{{ $p_edu }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Search" style="margin-top: 20px;">
            </form>
            <!-- Generate Report Button -->
            <form method="GET" action="{{ route('manage_publication.MentorGenerateFilteredPublication') }}" style="margin-top: 10px;">
                <input type="hidden" name="search_query" value="{{ request('search_query') }}">
                <input type="hidden" name="search_type" value="{{ request('search_type') }}">
                <input type="hidden" name="publication_type" value="{{ request('publication_type') }}">
                <input type="hidden" name="ownership_type" value="{{ request('ownership_type') }}">
                <input type="hidden" name="publication_year" value="{{ request('publication_year') }}">
                <input type="hidden" name="publication_uni" value="{{ request('publication_uni') }}">
                <button type="submit" class="action-button generate-filter">Generate Filter</button>
            </form>
        </div>
    </div>

    <div class="container">
        <table>
            <tr>
                <th class="mypub-th" style="width: 5%;">No.</th>
                <th class="mypub-th" style="width: 25%;">Publication title</th>
                <th class="mypub-th" style="width: 20%;">Authors</th>
                <th class="mypub-th" style="width: 15%;">Ownership</th>
                <th class="mypub-th" style="width: 15%;">Publication type</th>
                <th class="mypub-th" style="width: 15%;">University</th>
                <th class="mypub-th" style="width: 20%;">Action</th>
            </tr>
            @foreach($publications as $publication)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $publication->Pb_title }}</td>
                    <td>{{ $publication->Pb_authors }}</td>
                    <td>{{ $publication->Pb_belongs == 'Myself' ? 'Self-publication' : 'Expert publication' }}</td>
                    <td>{{ $publication->Pb_type }}</td>
                    <td>{{ $publication->platinum->P_EduInst }}</td>
                    <td class="action-buttons-container">
                        <a href="{{ route('manage_publication.MentorViewPublication', ['publication' => $publication->Pb_ID]) }}">
                            <button class="action-button view">View</button>
                        </a>
                        <a href="{{ route('manage_publication.MentorGeneratePublication', ['publication' => $publication->Pb_ID]) }}">
                            <button class="action-button generate">Generate</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- Pagination Links -->
    <div class="pagination-links">
        {{ $publications->links() }}
    </div>
</section>

@endsection
