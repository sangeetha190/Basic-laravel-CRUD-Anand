<!DOCTYPE html>
<html>

<head>
    <title>API Data Display</title>
</head>

<body>
    <h1>API Data</h1>

    <ul>
        {{-- {{ dd($jsonData ) }} --}}
        @foreach ($jsonData as $key => $value)
            @if ($key === 'number' || $key === 'sect_tam')
                <p> {{ $value }}</p>
            @endif
        @endforeach
    </ul>
</body>

</html>
