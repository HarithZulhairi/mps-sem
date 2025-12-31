@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/MyPublication.css') }}" rel="stylesheet">

<section>
  <div class="titleText"><b>My Publication</b></div>
  
  <div class="success-message">
    @if(session()->has('success'))
        <div>{{ session('success')}}</div>
    @endif
  </div>

  <div class="container">
    <div class="filter-wrapper">
        <form action="{{ route('manage_publication.PlatinumMyPublication') }}" method="GET" class="search-form">
            <div class="filter-group">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by publication title..." class="search-input">
                
                <select name="type" class="filter-select">
                    <option value="">All Types</option>
                    <option value="Article" {{ request('type') == 'Article' ? 'selected' : '' }}>Article</option>
                    <option value="Journal" {{ request('type') == 'Journal' ? 'selected' : '' }}>Journal</option>
                    <option value="Book" {{ request('type') == 'Book' ? 'selected' : '' }}>Book</option>
                    <option value="Conference Paper" {{ request('type') == 'Conference Paper' ? 'selected' : '' }}>Conference Paper</option>
                </select>

                <select name="belongs" class="filter-select">
                    <option value="">All Ownership</option>
                    <option value="Myself" {{ request('belongs') == 'Myself' ? 'selected' : '' }}>Myself</option>
                    <option value="Expert" {{ request('belongs') == 'Expert' ? 'selected' : '' }}>Expert</option>
                </select>

                <button type="submit" class="btn-filter">Search & Filter</button>
                <a href="{{ route('manage_publication.PlatinumMyPublication') }}" class="btn-reset">Reset</a>
            </div>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No.</th>
                <th style="width: 40%;">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'Pb_title', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}">
                        Publication Title @if(request('sort') == 'Pb_title') {{ request('order') == 'asc' ? '↑' : '↓' }} @endif
                    </a>
                </th>
                <th>Type</th>
                <th>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'Pb_belongs', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}">
                        Ownership @if(request('sort') == 'Pb_belongs') {{ request('order') == 'asc' ? '↑' : '↓' }} @endif
                    </a>
                </th>
                <th style="width: 25%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publications as $publication)
                <tr>
                    <td>{{ ($publications->currentPage() - 1) * $publications->perPage() + $loop->iteration }}</td>
                    <td style="text-align: left;">{{$publication->Pb_title}}</td>
                    <td><span class="badge type-{{ strtolower(str_replace(' ', '-', $publication->Pb_type)) }}">{{$publication->Pb_type}}</span></td>
                    <td>{{$publication->Pb_belongs}}</td>
                    <td class="action-buttons-container">
                        <div class="icon-actions">
                            <a href="{{ route('manage_publication.PlatinumViewPublication', ['publication' => $publication->Pb_ID]) }}">
                                <button class="action-button view"><i class="fa-solid fa-eye"></i></button>
                            </a>
                            <a href="{{ route('manage_publication.PlatinumEditPublication', ['publication' => $publication->Pb_ID]) }}">
                                <button class="action-button edit"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <form id="deleteForm_{{ $publication->Pb_ID }}" method="post" action="{{ route('manage_publication.delete', ['publication' => $publication->Pb_ID]) }}" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-button delete" onclick="return confirmDelete('{{ $publication->Pb_ID }}')"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  <div class="links">
    {{ $publications->appends(request()->query())->links() }}
  </div>

</section>

@endsection