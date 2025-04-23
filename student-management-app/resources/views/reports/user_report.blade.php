<!DOCTYPE html>
<html>
<head>
    <title>User Report</title>
    <style>
        .report-container {
        width: 148mm; /* A5 width */
        height: 210mm; /* A5 height */
        padding: 10mm;
        margin: auto;
        background: white;
        border: 1px solid #ddd;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 5px;
        text-align: left;
        font-size: 12px;
    }

    th {
        background-color: #f2f2f2;
        font-size: 12px;
    }
        /* table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        } */
    </style>
</head>
<body>
    


    <div class="report-container">
        <h2>User Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
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
        <div>
            <a href="{{ route('download-report') }}" class="btn btn-primary">Download PDF</a>
            <a href="{{ route('print-report') }}" class="btn btn-success" target="_blank">Print</a>
            </div>
    </div>


    {{-- <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <div>
    <a href="{{ route('download-report') }}" class="btn btn-primary">Download PDF</a>
    <a href="{{ route('print-report') }}" class="btn btn-success" target="_blank">Print</a>
    </div>
</body>
</html>
