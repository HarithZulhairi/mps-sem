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
                <input type="text" name="search_query" placeholder="Search..." value="{{ old('search_query') }}">
                <select name="search_type">
                    <option value="title" {{ old('search_type') == 'title' ? 'selected' : '' }}>Title</option>
                    <option value="authors" {{ old('search_type') == 'authors' ? 'selected' : '' }}>Authors</option>
                </select>

                <!-- Filter Options -->
                <div class="filter-container">
                    <label for="publication_type">Publication Type:</label>
                    <select name="publication_type" id="publication_type">
                        <option value="">All</option>
                        <option value="article" {{ old('publication_type') == 'article' ? 'selected' : '' }}>Article</option>
                        <option value="journal" {{ old('publication_type') == 'journal' ? 'selected' : '' }}>Journal</option>
                        <option value="conference" {{ old('publication_type') == 'conference' ? 'selected' : '' }}>Conference Paper</option>
                        <option value="book" {{ old('publication_type') == 'book' ? 'selected' : '' }}>Book</option>
                    </select>

                    <label for="ownership_type">Ownership:</label>
                    <select name="ownership_type" id="ownership_type">
                        <option value="">All</option>
                        <option value="expert" {{ old('ownership_type') == 'expert' ? 'selected' : '' }}>Expert Only</option>
                        <option value="self" {{ old('ownership_type') == 'self' ? 'selected' : '' }}>Self Publication</option>
                    </select>

                    <input type="submit" value="Search">
                </div>
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
                <th class="mypub-th" style="width: 20%;">Action</th>
            </tr>
            @foreach($publications as $publication)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $publication->Pb_title }}</td>
                    <td>{{ $publication->Pb_authors }}</td>
                    <td>{{ $publication->Pb_belongs == 'Myself' ? 'Self-publication' : 'Expert publication' }}</td>
                    <td>{{ $publication->Pb_type }}</td>
                    <td class="action-buttons-container">
                        <a href="{{ route('manage_publication.MentorViewPublication', ['publication' => $publication->Pb_ID]) }}">
                            <button class="action-button">View</button>
                        </a>
                        <a href="{{ route('manage_publication.MentorGeneratePublication', ['publication' => $publication->Pb_ID]) }}">
                            <button class="action-button">Generate</button>
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
