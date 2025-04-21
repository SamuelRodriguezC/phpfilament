<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Conferencias</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead {
            background-color: #f2f2f2;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #dcdcdc;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h1>Estas Son Tus Conferencias</h1>

    <table>
        <thead>
            <tr>
                <th>Conferencia</th>
                <th>Descripción</th>
                <th>Estado</th>
                {{-- <th>Fecha Inicio</th> --}}
                {{-- <th>Fecha Final</th> --}}
                <th>Lugar</th>
                <th>Conferencista</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conferences as $conference)
                <tr>
                    <td>{{ $conference->name }}</td>
                    <td>{{ $conference->description }}</td>
                    <td>{{ $conference->status }}</td>
                    {{-- <td>{{ $conference->start_date }}</td> --}}
                    {{-- <td>{{ $conference->end_date }}</td> --}}
                    <td>{{ $conference->region }}</td>
                    <td>{{ $conference->speaker->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
