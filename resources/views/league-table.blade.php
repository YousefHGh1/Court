<!DOCTYPE html>
<html>
<head>
    <title>جدول ترتيب الدوري الإسباني</title>
</head>
<body>
    <h1>جدول ترتيب الدوري الإسباني</h1>
    <table>
        <thead>
            <tr>
                <th>الترتيب</th>
                <th>الفريق</th>
                <th>النقاط</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $team)
                <tr>
                    {{-- <td>{{ $team['rank'] }}</td> --}}
                    <td>{{ $team['name'] }}</td>
                    {{-- <td>{{ $team['points'] }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

