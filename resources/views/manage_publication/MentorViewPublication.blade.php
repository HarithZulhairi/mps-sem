@extends('layouts/masterMentor')
@section('content')

<link href="{{ asset('style_manage_publication/ViewPublication.css') }}" rel="stylesheet">

<div class="grid-container">
  <div class="grid-item item1">
    <h2 class="publication-title">{{ $publication->Pb_title }}</h2>
    <p class="publication-date">Published date: {{ (new DateTime($publication->Pb_date))->format('j F Y') }}</p>
    <a class="a-download-publication" href="{{ Storage::url($publication->Pb_file_path) }}" download>
        <button class="download-publication"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
    </a>
    <a class="a-cite-publication">
        <button class="cite-publication" onclick="showCitationPopup()">Cite This</button>
    </a>
    <br>
    <p class="publication-type {{ strtolower($publication->Pb_type) }}">{{ $publication->Pb_type }}</p>

    <div class="publication-authors">
      <b>Authors:</b><br>
      <p style="margin-top: 10px; color: #069;">{{ $publication->Pb_authors }}</p>
    </div>
  </div>

  <div class="grid-item item2">
    @php
      $infoLeft = [];
      $infoRight = [];

      if ($publication->Pb_DOI) $infoLeft[] = "<p class='publication-DOI'><b>DOI:</b> $publication->Pb_DOI</p>";
      if ($publication->Pb_peer) $infoRight[] = "<p class='publication-peer-review'><b>Peer Reviewed:</b> " . ($publication->Pb_peer == 'peered' ? 'Yes' : 'No') . "</p>";
      if ($publication->Pb_journalName) $infoLeft[] = "<p class='publication-journal-name'><b>Journal/Book Name:</b> $publication->Pb_journalName</p>";
      if ($publication->Pb_volume) $infoRight[] = "<p class='publication-volume'><b>Volume:</b> $publication->Pb_volume</p>";
      if ($publication->Pb_issue) $infoLeft[] = "<p class='publication-issue'><b>Issue:</b> $publication->Pb_issue</p>";
      if ($publication->Pb_page) $infoRight[] = "<p class='publication-page'><b>Page:</b> $publication->Pb_page</p>";
      if ($publication->Pb_conferenceName) $infoLeft[] = "<p class='publication-conference-name'><b>Conference Name:</b> $publication->Pb_conferenceName</p>";
      if ($publication->Pb_conf_volume) $infoRight[] = "<p class='publication-conf-volume'><b>Conference Volume:</b> $publication->Pb_conf_volume</p>";
      if ($publication->Pb_conf_issue) $infoLeft[] = "<p class='publication-conf-issue'><b>Conference Issue:</b> $publication->Pb_conf_issue</p>";
      if ($publication->Pb_conf_location) $infoRight[] = "<p class='publication-conf-location'><b>Conference Location:</b> $publication->Pb_conf_location</p>";
      if ($publication->Pb_existingDOI) $infoLeft[] = "<p class='publication-existing-doi'><b>Existing DOI:</b> $publication->Pb_existingDOI</p>";
      if ($publication->Pb_refers) $infoRight[] = "<p class='publication-refers'><b>Refers to:</b> $publication->Pb_refers</p>";
      $belongsText = $publication->Pb_belongs == 'Expert' ? 'Expert Publication' : 'Self-publication';
      $infoLeft[] = "<p class='publication-belongs'><b>Publication Belongs:</b> $belongsText</p>";
    @endphp

    <div class="info-left">
      {!! implode('', $infoLeft) !!}
    </div>
    <div class="info-right">
      {!! implode('', $infoRight) !!}
    </div>
  </div>


  <div class="grid-item item3">
    <div class="publication-abstract-title">
      <b>Abstract:</b><br>
    </div>
    <div class="publication-abstract">
      {{ $publication->Pb_abstract }}
    </div>
  </div>

  <div class="grid-item item4">
    <div class="publication-file-show">
      @if($publication->Pb_file_path)
        <iframe src="{{ Storage::url($publication->Pb_file_path) }}" width="100%" height="600px"></iframe>
      @else
        <p>No file uploaded.</p>
      @endif
    </div>
  </div>
</div>

<!-- Citation Popup -->
<div id="citation-popup" class="citation-popup">
  <div class="citation-popup-content">
    <span class="close" onclick="hideCitationPopup()">&times;</span>
    <h2 style="text-align: center; padding-left: 20px; margin-bottom: 21px;">Citation Formats</h2>
    <div class="ieee-citation-box">
      <p><b>IEEE:</b></p>
      <p id="ieee-citation">
        @if($publication->Pb_type == 'Journal' || $publication->Pb_type == 'Book')
          {{ $publication->Pb_authors }}, "{{ $publication->Pb_title }}," <i>{{ $publication->Pb_journalName }}</i>, vol. {{ $publication->Pb_volume }}, no. {{ $publication->Pb_issue }}, pp. {{ $publication->Pb_page }}, {{ (new DateTime($publication->Pb_date))->format('Y') }}.
        @elseif($publication->Pb_type == 'Conference Paper')
          {{ $publication->Pb_authors }}, "{{ $publication->Pb_title }}," in <i>{{ $publication->Pb_conferenceName }}</i>, vol. {{ $publication->Pb_conf_volume }}, no. {{ $publication->Pb_conf_issue }}, pp. {{ $publication->Pb_page }}, {{ (new DateTime($publication->Pb_date))->format('Y') }}.
        @elseif($publication->Pb_type == 'Article')
          {{ $publication->Pb_authors }}, "{{ $publication->Pb_title }}," <i>{{ $publication->Pb_journalName }}</i>, {{ (new DateTime($publication->Pb_date))->format('Y') }}.
        @endif
      </p>
      <button onclick="copyToClipboard('ieee-citation')">Copy IEEE</button>
    </div>
    <div class="apa-citation-box">
      <p><b>APA 7th:</b></p>
      <p id="apa-citation">
        @if($publication->Pb_type == 'Journal' || $publication->Pb_type == 'Book')
          {{ $publication->Pb_authors }} ({{ (new DateTime($publication->Pb_date))->format('Y') }}). {{ $publication->Pb_title }}. <i>{{ $publication->Pb_journalName }}</i>, {{ $publication->Pb_volume }}({{ $publication->Pb_issue }}), {{ $publication->Pb_page }}. https://doi.org/{{ $publication->Pb_DOI }}
        @elseif($publication->Pb_type == 'Conference Paper')
          {{ $publication->Pb_authors }} ({{ (new DateTime($publication->Pb_date))->format('Y') }}). {{ $publication->Pb_title }}. In <i>{{ $publication->Pb_conferenceName }}</i> (Vol. {{ $publication->Pb_conf_volume }}, No. {{ $publication->Pb_conf_issue }}, pp. {{ $publication->Pb_page }}). https://doi.org/{{ $publication->Pb_DOI }}
        @elseif($publication->Pb_type == 'Article')
          {{ $publication->Pb_authors }} ({{ (new DateTime($publication->Pb_date))->format('Y') }}). {{ $publication->Pb_title }}. <i>{{ $publication->Pb_journalName }}</i>. https://doi.org/{{ $publication->Pb_DOI }}
        @endif
      </p>
      <button onclick="copyToClipboard('apa-citation')">Copy APA</button>
    </div>
  </div>
</div>


@endsection