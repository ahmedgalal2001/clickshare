<!DOCTYPE html>
<html>
<head>
    <title>Google Sheets Data</title>
</head>
<body>
    <h1>Google Sheets Data</h1>
    <table border="1">
        @foreach ($sheetData as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
