<!DOCTYPE html>
<html>
<head>
    <title>User Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>User Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
