<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pemilih</title>

    <style>
        @page {
            margin: 2cm;
        }
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font: 12pt Arial, Helvetica, sans-serif;
        }
        .page {
            page-break-after: always
        }
        table {
            width: 100%;
        }
        td, th {
            padding: 5px 10px;
            border-bottom: 1px solid #000;
            text-align: left;
        }
        h3 {
            font-size: 16pt;
            margin-bottom: 20px;
            border-bottom: 1px solid #000;
        }
    </style>
</head>
<body onload="window.print()">
    @foreach ($classrooms as $classroom)
        <div class="page">
            <h3>Data Pemilih Kelas {{ $classroom->name }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kode Akses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classroom->voters as $voter)
                        <tr>
                            <td width="20%">{{ $classroom->name }}</td>
                            <td>{{ $voter->name }}</td>
                            <td width="20%">{{ $voter->id }}</td>
                            <td width="20%"><code>{{ $voter->access_code }}</code></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
