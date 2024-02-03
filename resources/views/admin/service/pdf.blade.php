<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Service Content</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1 style="text-align:center;">Service Element</h1>
    <table border="1" class="">
        <thead class="heading_col">
            <tr>
                <th>Service Title</th>
                <th>Service Detail</th>
                <th>Service Icon</th>
                <th>Creator</th>
            </tr>
        </thead>
        <tbody>
            @if($data->count() > 0)
                @foreach($data as $data)
                    <tr class="table_font">
                        <td>{{ $data->ser_title }}</td>
                        <td>
                            {{ Str::words($data->ser_detail,10) }}
                        </td>
                        <td>
                            {{ $data->ser_icon }}
                        </td>
                        <td>{{ $data->creator->name }}</td>
                    </tr>
                @endforeach
            @else
                <h2>No Data IS Available !</h2>
            @endif
        </tbody>
    </table>
</body>

</html>
