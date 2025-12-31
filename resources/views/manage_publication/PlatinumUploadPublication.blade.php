@extends('layouts/masterPlatinum')
@section('content')

<link href="{{asset('style_manage_publication/UploadPublication.css')}}" rel="stylesheet">

<section>
  <div class="titleText">
    <b>Add Your Publication</b>
    <p class="subtitle">Share your latest research with the academic community</p>
  </div>
  
  <div class="required-asterisk"><b>* required</b></div>
  
  <div style="text-align: center; color: #e74c3c; margin-bottom: 20px;">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
  </div>

  <div class="container">
    <form method="post" action="{{route('manage_publication.store')}}" enctype="multipart/form-data">
      @csrf
      @method('post')

      <div class="form-group">
        <label><b>Research Type: <span style="color: red">*</span></b></label>
        <select id="Pb_type" name="Pb_type" onchange="toggleFields()">
          <option value="Article">Article</option>
          <option value="Journal">Journal</option>
          <option value="Book">Book</option>
          <option value="Conference Paper">Conference Paper</option>
        </select>
      </div>

      <div class="form-group">
        <label><b>Is this publication belongs to expert? <span style="color: red">*</span></b></label>
        <select id="Pb_belongs" name="Pb_belongs" style="width: auto;" onchange="toggleAuthors()">
          <option value="Myself">No, myself</option>
          <option value="Expert">Yes</option>
        </select>
      </div>

      <div class="form-group">
        <label><b>Title: <span style="color: red">*</span></b></label>
        <input type="text" name="Pb_title" placeholder="Enter your publication title">
      </div>

      <div class="form-group">
          <label><b>Authors: <span style="color: red">*</span></b></label>
          <div id="authors-container">
            <input id="Pb_authors-textField" name="Pb_authors[]" type="text" placeholder="Enter author name">
            <select id="Pb_authors-options" name="Pb_authors[]" style="display: none;">
              @if($experts->isEmpty())
                  <option value="">Select expert</option>
              @else
                  @foreach($experts as $expert)
                      <option value="{{ $expert->E_Name }}">{{ $expert->E_Name }}</option>
                  @endforeach
              @endif
            </select>
          </div>
          <button class="add-author-button" type="button" onclick="addAuthorField()">+ Co-authors</button>
      </div>

      <div class="form-group">
        <label><b>Date of Publication: <span style="color: red">*</span></b></label>
        <input type="date" name="Pb_date">
      </div>

      <div class="form-group">
        <label><b>DOI:</b></label>
        <input type="text" name="Pb_DOI" placeholder="e.g. 10.1000/xyz123">
      </div>

      <div class="form-group">
        <label><b>Abstract:</b></label>
        <textarea name="Pb_abstract" placeholder="Briefly explain your research..."></textarea>
      </div>

      <div class="form-group">
          <label><b>Has this been peer reviewed?</b></label>
          <select id="Pb_peer" name="Pb_peer" style="width: auto;">
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
      </div>

      <div id="journalFields" style="display: none; background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <div class="form-group">
          <label><b>Journal/Book name:</b> <span style="color: red">*</span></label>
          <input type="text" name="Pb_journalName" placeholder="Enter journal name">
        </div>
        <div class="fields-grid">
            <div><label><b>Volume:</b></label><input type="text" name="Pb_volume"></div>
            <div><label><b>Issue:</b></label><input type="text" name="Pb_issue"></div>
            <div><label><b>Page:</b></label><input type="text" name="Pb_page"></div>
        </div>
      </div>

      <div id="conferenceFields" style="display: none; background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <div class="form-group">
          <label><b>Conference name:</b> <span style="color: red">*</span></label>
          <input type="text" name="Pb_conferenceName" placeholder="Enter conference name">
        </div>
        <div class="fields-grid">
            <div><label><b>Volume:</b></label><input type="text" name="Pb_conf_volume"></div>
            <div><label><b>Issue:</b></label><input type="text" name="Pb_conf_issue"></div>
            <div><label><b>Location:</b></label><input type="text" name="Pb_conf_location"></div>
        </div>
      </div>

      <div class="form-group">
        <label><b>Existing DOI:</b></label>
        <input type="text" name="Pb_existingDOI" placeholder="Enter existing DOI if applicable">
      </div>

      <div class="form-group">
        <label><b>Which publication refers to? <span style="color: red">*</span></b></label>
        <select id="Pb_refers" name="Pb_refers">
          @if($researches->isEmpty())
              <option value="">No research projects found</option>
          @else
              @foreach($researches as $research)
                  <option value="{{ $research->RI_title }}">{{ $research->RI_title }}</option>
              @endforeach
          @endif
        </select>
      </div>

      <div class="form-group">
        <label for="Pb_file_input"><b>Add a file: <span style="color: red">*</span> <small>(PDF only)</small></b></label>
        <input type="file" id="Pb_file_input" name="Pb_file" accept="application/pdf" style="display: none;" onchange="updateFileName(this)">
        <button type="button" class="upload-button" onclick="document.getElementById('Pb_file_input').click()">📁 Choose File</button>
        <p id="file_name"></p> 
      </div>

      <div class="agreement-box">
          <input type="checkbox" id="agreement" name="agreement" value="1">
          <label for="agreement">I have reviewed and verified each file I am uploading. I have the right to share each file publicly, and agree to the Upload Conditions <span style="color: red">*</span></label>
      </div>

      <div class="submit-container">
        <input type="submit" class="submit-button-input" value="Submit Publication">
      </div>

    </form>
  </div>
</section>

@endsection

<script>  
    var expertOptions = `@if($experts->isEmpty())
        <option value="">Select expert</option>
    @else
        @foreach($experts as $expert)
            <option value="{{ $expert->E_Name }}">{{ $expert->E_Name }}</option>
        @endforeach
    @endif`;
</script>