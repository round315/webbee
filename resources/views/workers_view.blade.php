<!DOCTPE html>
<html>
<head>
    <title>View Student Records</title>
</head>
<body>
    <table>
        <tr>
            <td>Id</td>
            <td>name</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>workshop_start</td>
            <td>workshop_end</td>
            <td>workshop_name</td>
        </tr>
        @foreach ($workers as $worker)
        <tr>
            <td>{{ $worker->id }}</td>
            <td>{{ $worker->name }}</td>
            <td>{{ $worker->created_at }}</td>
            <td>{{ $worker->updated_at }}</td>
            <td>{{ $worker->start }}</td>
            <td>{{ $worker->end }}</td>
            <td>{{ $worker->name }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>