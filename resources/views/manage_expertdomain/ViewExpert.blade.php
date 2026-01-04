@extends('layouts/masterPlatinum')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .center {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 40px;
            margin: 20px;
            justify-content: center;
        }

        header {
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
        }

        header nav {
            font-size: 14px;
            margin-top: 5px;
        }

        .profile-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .profile-details {
            width: 65%;
        }

        .profile-photo {
            width: 30%;
            text-align: center;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .profile-photo img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-photo p {
            margin-top: 10px;
            font-weight: italic;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-table td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        .profile-table .section-title {
            background-color: #eee;
            font-weight: bold;
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
            align-self: center;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        document.querySelector(".publication-link").addEventListener("click", function() {
            var url = "manage_expertdomain.ViewPublication";
            window.location.href = url;
        });

        function goBack() {
            window.history.back();
        }
    </script>

    <div class="center">

        <body>
            <div class="profile-container">
                <div class="profile-details">
                    <h2 style="margin-bottom: 20px; border-bottom: 3px solid #007bff; padding-bottom: 10px;">
                        Expert Profile & Research Publications
                    </h2>

                    <table class="profile-table">

                        {{-- ================= PERSONAL DETAIL ================= --}}
                        <tr>
                            <td colspan="2" class="section-title">PERSONAL DETAIL</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Title:</b> {{ $expertdomain->E_Title }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Permanent Position:</b> {{ $expertdomain->E_Position }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Workplace:</b> {{ $expertdomain->E_Workplace }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Qualification:</b>
                                @foreach (json_decode($expertdomain->E_Qualification, true) as $qualification)
                                    <div>{{ $qualification }}</div>
                                @endforeach
                            </td>
                        </tr>

                        {{-- ================= FIELD ================= --}}
                        <tr>
                            <td colspan="2" class="section-title">FIELD</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Category of Expertise:</b> {{ $expertdomain->E_CategoryExpertise }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Group of Expertise:</b>
                                @foreach (json_decode($expertdomain->E_GroupExpertise, true) as $group)
                                    <div>{{ $group }}</div>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Area of Expertise:</b>
                                @foreach (json_decode($expertdomain->E_AreaExpertise, true) as $area)
                                    <div>{{ $area }}</div>
                                @endforeach
                            </td>
                        </tr>

                        {{-- ================= RESEARCH & PUBLICATIONS ================= --}}
                        <tr>
                            <td colspan="2" class="section-title">RESEARCH & RELATED PUBLICATIONS</td>
                        </tr>

                        @php
                            $researchTitles = json_decode($expertdomain->E_ResearchTitle ?? '[]', true);
                            $durationStart = json_decode($expertdomain->E_DurationStart ?? '[]', true);
                            $durationEnd = json_decode($expertdomain->E_DurationEnd ?? '[]', true);
                            $agent = json_decode($expertdomain->E_Agent ?? '[]', true);
                            $role = json_decode($expertdomain->E_Role ?? '[]', true);
                            $cost = json_decode($expertdomain->E_Cost ?? '[]', true);
                            $status = json_decode($expertdomain->E_Status ?? '[]', true);

                            $publicationTitles = json_decode($expertdomain->E_PublicationTitle ?? '[]', true);
                            $publicationDates = json_decode($expertdomain->E_PublicationDate ?? '[]', true);
                            $publicationResearch = json_decode($expertdomain->E_PublicationResearch ?? '[]', true);
                        @endphp

                        {{-- ===== LOOP EACH RESEARCH ===== --}}
                        @foreach ($researchTitles as $rIndex => $researchTitle)
                            <tr>
                                <td colspan="2" style="background:#f0f8ff; font-weight:bold;">
                                    Research {{ $rIndex + 1 }} – {{ $researchTitle }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <small>
                                        <b>Duration:</b> {{ $durationStart[$rIndex] ?? '-' }} –
                                        {{ $durationEnd[$rIndex] ?? '-' }} |
                                        <b>Agent:</b> {{ $agent[$rIndex] ?? '-' }} |
                                        <b>Role:</b> {{ $role[$rIndex] ?? '-' }} |
                                        <b>Cost:</b> RM {{ $cost[$rIndex] ?? '-' }} |
                                        <b>Status:</b> {{ $status[$rIndex] ?? '-' }}
                                    </small>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Publication Title</b></td>
                                <td><b>Publication Date</b></td>
                            </tr>

                            @php $hasPublication = false; @endphp

                            @foreach ($publicationTitles as $pIndex => $publicationTitle)
                                @if (isset($publicationResearch[$pIndex]) && $publicationResearch[$pIndex] == $rIndex)
                                    @php $hasPublication = true; @endphp
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('manage_expertdomain.ViewPublication', [
                                                    'expertdomain' => $expertdomain->E_ID,
                                                    'publicationTitle' => $publicationTitle,
                                                ]) }}">
                                                {{ $publicationTitle }}
                                            </a>
                                        </td>
                                        <td>{{ $publicationDates[$pIndex] ?? '-' }}</td>
                                    </tr>
                                @endif
                            @endforeach

                            @if (!$hasPublication)
                                <tr>
                                    <td colspan="2" style="font-style: italic; color:#888;">
                                        No publications assigned to this research.
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        {{-- ================= All Publication ================= --}}
                        <tr>
                            <td colspan="2" class="section-title">All Publication</td>
                        </tr>

                        <tr>
                            <td><b>Publication Title</b></td>
                            <td><b>Publication Date</b></td>
                        </tr>

                        @if (!empty($publicationTitles))
                            @foreach ($publicationTitles as $pIndex => $publicationTitle)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('manage_expertdomain.ViewPublication', [
                                                'expertdomain' => $expertdomain->E_ID,
                                                'publicationTitle' => $publicationTitle,
                                            ]) }}">
                                            {{ $publicationTitle }}
                                        </a>
                                    </td>
                                    <td>{{ $publicationDates[$pIndex] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" style="font-style: italic; color:#888;">
                                    No publications.
                                </td>
                            </tr>
                        @endif

                    </table>

                </div>
                <div class="profile-photo">
                    <img src="{{ asset('uploads/' . $expertdomain->E_Photo) }}" alt="Expert Photo">
                    <p><b>{{ $expertdomain->E_Title }} {{ $expertdomain->E_Name }}</b></p>
                    <p>{{ $expertdomain->E_Email }}</p>
                </div>
            </div>
            <button class="back-button" onclick="goBack()">Back</button>
        </body>
    </div>
@endsection
