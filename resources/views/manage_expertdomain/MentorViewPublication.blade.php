@extends('layouts/masterMentor')

@section('content')

<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .center {
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 40px;
        max-width: 100%;
        width: 97%;
        box-sizing: border-box;
        margin: 20px;
        align-items: left;
    }

    h4 {
        color: #333333;
        margin-top: 20px;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    p {
        color: #666666;
        margin: 10px 0;
        font-size: 1.1rem;
    }

    .link-button {
        margin-top: 20px;
        width: 200px;
        padding: 10px 20px;
        font-size: 1.1rem;
        color: #ffffff;
        background-color: #D5C437;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: center;
    }

    .link-button:hover {
        background-color: #aa9c2c;
    }

    .back-button {
        margin-top: 20px;
        width: 200px;
        padding: 10px 20px;
        font-size: 1.1rem;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: left;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="center">
        @php
            $publicationTitles = json_decode($expertdomain->E_PublicationTitle, true);
            $authors = json_decode($expertdomain->E_Authors, true);
            $publicationDates = json_decode($expertdomain->E_PublicationDate, true);
            $sources = json_decode($expertdomain->E_Source, true);
            $volumes = json_decode($expertdomain->E_Volume, true);
            $pages = json_decode($expertdomain->E_Pages, true);
            $publishers = json_decode($expertdomain->E_Publisher, true);
            $links = json_decode($expertdomain->E_Link, true);
        @endphp

        @if (isset($publicationTitles[$publication]))
            <h4>{{ $publicationTitles[$publication] }}</h4>
            <p><strong>Authors:</strong> {{ $authors[$publication] }}</p>
            <p><strong>Publication Date:</strong> {{ $publicationDates[$publication] }}</p>
            <p><strong>Source:</strong> {{ $sources[$publication] }}</p>
            <p><strong>Volume:</strong> {{ $volumes[$publication] }}</p>
            <p><strong>Pages:</strong> {{ $pages[$publication] }}</p>
            <p><strong>Publisher:</strong> {{ $publishers[$publication] }}</p>
            <a href="{{ $links[$publication] }}" target="_blank">
                <button class="link-button">View Publication</button>
            </a><br>
        @endif

            <button class="back-button" onclick="goBack()">Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

@endsection
