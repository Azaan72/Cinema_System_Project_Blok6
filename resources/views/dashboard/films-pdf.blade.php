<!DOCTYPE html>
<html>
<head>
    <title>Films Dashboard</title>
    <style>
        body { font-family: sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Films Dashboard</h1>

    <table>
        <tr>
            <th>Statistiek</th>
            <th>Aantal</th>
        </tr>
        <tr>
            <td>Films</td>
            <td>{{ $moviesCount }}</td>
        </tr>
        <tr>
            <td>Klanten</td>
            <td>{{ $usersCount }}</td>
        </tr>
        <tr>
            <td>Tickets</td>
            <td>{{ $ticketsCount }}</td>
        </tr>
    </table>
</body>
</html>