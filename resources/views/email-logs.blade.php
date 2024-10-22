
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Email Logs</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('welcome') }}">
                    <button type="button" class="btn btn-info">Send Email</button>
                </a>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Recipient Email</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Error Message (if any)</th>
                    <th>Sent At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emailLogs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->recipient_email }}</td>
                        <td>{{ $log->subject }}</td>
                        <td>{{ $log->message }}</td>
                        <td>{{ $log->status }}</td>
                        <td>{{ $log->error_message ?? 'N/A' }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
