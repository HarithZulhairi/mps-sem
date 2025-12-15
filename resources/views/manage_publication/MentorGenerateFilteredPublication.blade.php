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

        .summary {
            margin-bottom: 20px;
        }

        .summary p {
            margin: 5px 0;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
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

        <div class="summary">
            <p><strong>Total Publications:</strong> {{ $totalPublications }}</p>
            <p><strong>Publication Types:</strong> 
                @foreach($totalTypes as $type => $count)
                    {{ $type }}: {{ $count }}&nbsp;
                @endforeach
            </p>
            <p><strong>Ownership:</strong>
                @foreach($totalOwnerships as $ownership => $count)
                    {{ $ownership }}: {{ $count }}&nbsp;
                @endforeach
            </p>
            <p><strong>Years:</strong>
                @foreach($totalYears as $year => $count)
                    {{ $year }}: {{ $count }}&nbsp;
                @endforeach
            </p>
            <p><strong>Universities:</strong>
                @foreach($totalUniversities as $university => $count)
                    {{ $university }}: {{ $count }}&nbsp;
                @endforeach
            </p>
        </div>

        <table>
            <tr>
                <th class="mypub-th" style="width: 5%;">No.</th>
                <th class="mypub-th" style="width: 25%;">Publication title</th>
                <th class="mypub-th" style="width: 20%;">Authors</th>
                <th class="mypub-th" style="width: 15%;">Ownership</th>
                <th class="mypub-th" style="width: 15%;">Publication type</th>
                <th class="mypub-th" style="width: 15%;">University</th>
            </tr>
            @foreach($publications as $publication)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $publication->Pb_title }}</td>
                    <td>{{ $publication->Pb_authors }}</td>
                    <td>{{ $publication->Pb_belongs == 'Myself' ? 'Self-publication' : 'Expert publication' }}</td>
                    <td>{{ $publication->Pb_type }}</td>
                    <td>{{ $publication->platinum->P_EduInst }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        Generated on: {{ date('F j, Y, g:i a') }}
    </div>
</body>
</html>
