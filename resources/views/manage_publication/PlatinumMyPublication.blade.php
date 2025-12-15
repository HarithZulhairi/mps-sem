@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/MyPublication.css') }}" rel="stylesheet">

<section>
  <div class="titleText"><b>My publication</b></div>
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
            <th class="mypub-th" style="width: 10%;">No.</th>
            <th class="mypub-th" style="width: 40%;">Publication title</th>
            <th class="mypub-th">Ownership</th>
            <th class="mypub-th" style="width: 70%;">Action</th>
        </tr>
        @foreach($publications as $publication)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$publication->Pb_title}}</td>
                <td>{{$publication->Pb_belongs}}</td>
                <td class="action-buttons-container">
                    <a href="{{ route('manage_publication.PlatinumViewPublication', ['publication' => $publication->Pb_ID]) }}">
                        <button class="action-button view">View</button>
                    </a>
                    <a href="{{ route('manage_publication.PlatinumEditPublication', ['publication' => $publication->Pb_ID]) }}">
                        <button class="action-button edit">Edit</button>
                    </a>
                    <form id="deleteForm_{{ $publication->id }}" method="post" action="{{ route('manage_publication.delete', ['publication' => $publication]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="action-button delete" value="Delete" onclick="return confirmDelete({{ $publication->id }})">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
  <div class="links">
    {{ $publications->links() }}
  </div>

</section>
@endsection

