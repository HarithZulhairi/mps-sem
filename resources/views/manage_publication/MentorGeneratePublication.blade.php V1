<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Publications Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .publication-info {
            margin-bottom: 20px;
        }

        .publication-info p {
            margin: 5px 0;
            color: #555;
        }

        .publication {
            margin-bottom: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Publications Report</h1>
        <div class="publication">
            <div class="publication-info">
                <p><strong>Title:</strong> {{ $publication->Pb_title }}</p>
                <p><strong>Authors:</strong> {{ $publication->Pb_authors }}</p>
                @if($publication->Pb_DOI)
                    <p><strong>DOI:</strong> {{ $publication->Pb_DOI }}</p>
                @endif
                @if($publication->Pb_belongs == "Expert")
                    <p><strong>Belongs:</strong> Expert publication</p>
                @else
                    <p><strong>Belongs:</strong> Self-publication</p>
                @endif
                @if($publication->Pb_abstract)
                    <p><strong>Abstract:</strong> <br>{{ $publication->Pb_abstract }}</p>
                @endif
                @if($publication->Pb_peer == 1)
                    <p><strong>Peer Review:</strong> Yes</p>
                @else
                    <p><strong>Peer Review:</strong> No</p>
                @endif
                @if($publication->Pb_journalName)
                    <p><strong>Journal/Book name:</strong> {{ $publication->Pb_journalName }}</p>
                @endif
                @if($publication->Pb_volume)
                    <p><strong>Volume:</strong> {{ $publication->Pb_volume }}</p>
                @endif
                @if($publication->Pb_issue)
                    <p><strong>Issue:</strong> {{ $publication->Pb_issue }}</p>
                @endif
                @if($publication->Pb_page)
                    <p><strong>Page:</strong> {{ $publication->Pb_page }}</p>
                @endif
                @if($publication->Pb_conferenceName)
                    <p><strong>Conference Name:</strong> {{ $publication->Pb_conferenceName }}</p>
                @endif
                @if($publication->Pb_conf_volume)
                    <p><strong>Volume:</strong> {{ $publication->Pb_conf_volume }}</p>
                @endif
                @if($publication->Pb_conf_issue)
                    <p><strong>Issue:</strong> {{ $publication->Pb_conf_issue }}</p>
                @endif
                @if($publication->Pb_conf_location)
                    <p><strong>Location:</strong> {{ $publication->Pb_conf_location }}</p>
                @endif
                @if($publication->Pb_existingDOI)
                    <p><strong>Existing DOI:</strong> {{ $publication->Pb_existingDOI }}</p>
                @endif
                @if($publication->Pb_refers)
                    <p><strong>Research refers:</strong> {{ $publication->Pb_refers }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="footer">
        Generated on: {{ date('F j, Y, g:i a') }}
    </div>
</body>
</html>
