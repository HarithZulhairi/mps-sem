@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/UploadPublication.css') }}" rel="stylesheet">

<section>
  <div class="titleText"><b>Edit your research</b></div>
  <div class="required-asterisk"><b>* required</b></div>
  <div style="text-align: center; color: red;">
    @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      </ul>
    @endif
  </div>
  <div class="container">
    <form method="post" action="{{ route('manage_publication.update', ['publication' => $publication]) }}">
      @csrf'
      @method('put')
      <div class="research-type">
        <label>
          <b>Research Type: <span style="color: red">*</span></b>
        
        </label>
        <br>
        <select id="Pb_type" name="Pb_type" style="width: 100%; padding: 6px;" onchange="toggleFields()" >
          <option value="Article">Article</option>
          <option value="Journal">Journal</option>
          <option value="Book">Book</option>
          <option value="Conference Paper">Conference Paper</option>
        </select>
      </div>

      <br>

      <div class="publication-belongs">
        <label><b>Is this publication belongs to expert? <span style="color: red">*</span></b></label>
        <br>
        <select id="Pb_belongs" name="Pb_belongs" style="width: 30%; padding: 6px;" onchange="toggleAuthors()">
          <option value="Myself">No, myself</option>
          <option value="Expert">Yes</option>
        </select>
      </div>

      <br>

      <div class="publication-title">
        <label><b>Title: <span style="color: red">*</span></b></label>
        <br>
        <input type="text" name="Pb_title" placeholder="Enter your title here" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_title }}">
      </div>

      <br>

      <div class="publication-authors">
          <label><b>Authors: <span style="color: red">*</span></b></label>
          <br>
          <div id="authors-container">
            <input id="Pb_authors-textField" name="Pb_authors[]" type="text" placeholder="Enter author name" style="width:100%; padding: 6px 10px;">
            <select id="Pb_authors-options" name="Pb_authors[]" style="width: 100%; padding: 6px; display: none;">
              @if($experts->isEmpty())
                  <option value="">Select expert</option>
              @else
                  @foreach($experts as $expert)
                      <option value="{{ $expert->E_Name }}">{{ $expert->E_Name }}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <button class="add-author-button" type="button" onclick="addAuthorField()">Add Another Author</button>
      </div>

      <br>

      <div class="publication-date">
        <label><b>Date of Publication: <span style="color: red">*</span></b></label>
        <br>
        <input type="date" name="Pb_date" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_date }}">
      </div>

      <br>

      <div class="publication-doi">
        <label><b>DOI:</b></label>
        <br>
        <input type="text" name="Pb_DOI" placeholder="Enter DOI" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_DOI }}">
      </div>

      <br>

      <div class="publication-abstract">
        <label><b>Abstract:</b></label>
        <br>
        <textarea name="Pb_abstract" placeholder="Explain what is your article about" style="width:100%; padding: 6px 10px; height: 140px;" value="{{ $publication->Pb_abstract }}"></textarea>
      </div>

      <br>

      <div class="publication-peer">
        <label><b>Has this been peer reviewed?</b></label>
        <br>
        <select id="Pb_peer" name="Pb_peer" style="width: 20%; padding: 6px; " >
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>

      <br>

      <!-- Journal-specific fields -->
      <div id="journalFields" style="display: none;">
        <div class="publication-journal">
          <label><b>Journal/Book name:</b> <span style="color: red">*</span></label>
          <br>
          <input type="text" name="Pb_journalName" placeholder="Enter journal name here" style="width:100%; padding: 6px 10px;">
        </div>
        
        <br>

        <div class="publication-journal-content">
          <div class="journal-fields">
            <div class="journal-volume">
              <label><b>Volume:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_volume" placeholder="Enter a volume">
            </div>
            <div class="journal-issue">
              <label><b>Issue:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_issue" placeholder="Enter an issue">
            </div>
            <div class="journal-page">
              <label><b>Page:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_page" placeholder="Enter a page">
            </div>
          </div>
        </div>
      </div>

      <!-- Conference-specific fields -->
      <div id="conferenceFields" style="display: none;">
        <div class="publication-conference">
          <label><b>Conference name:</b> <span style="color: red">*</span></label>
          <br>
          <input type="text" name="Pb_conferenceName" placeholder="Enter conference name here" style="width:100%; padding: 6px 10px;">
        </div>
        
        <br>

        <div class="publication-conference-content">
          <div class="conference-fields">
            <div class="conference-volume">
              <label><b>Volume:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_conf_volume" placeholder="Enter a volume">
            </div>
            <div class="conference-issue">
              <label><b>Issue:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_conf_issue" placeholder="Enter an issue">
            </div>
            <div class="conference-location">
              <label><b>Location:</b> <span style="color: red">*</span></label>
              <input type="text" name="Pb_conf_location" placeholder="Enter location">
            </div>
          </div>
        </div>
      </div>

      <br>

      <div class="publication-existing-doi">
        <label><b>Existing DOI:</b></label>
        <br>
        <input type="text" name="Pb_existingDOI" placeholder="Enter existing DOI" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-refers">
        <label style="margin-bottom: 0;">
          <b>Which publication refers to? <span style="color: red">*</span></b>
          <br>
          <p>Select your project research:</p>
        </label>
        <select id="Pb_refers" name="Pb_refers" style="width: 100%; padding: 6px;">
          @if($researches->isEmpty())
              <option value="">No research</option>
          @else
              @foreach($researches as $research)
                  <option value="{{ $research->RI_title }}">{{ $research->RI_title }}</option>
              @endforeach
          @endif
        </select>
      </div>

      <br>

      <div class="edit-button">
        <input type="submit" value="Edit">
      </div>

    </form>
  </div>
</section>

@endsection