<!DOCTYPE html>
<html>
<head>
    <title>My First Blade Page</title>
</head>
<body>
    <h1>Assalamualaikum {{ $name }}!</h1>
    <p>আজকের তারিখ: {{ date('d M, Y') }}</p>
    <p>তোমার বয়স: {{ $age }}</p>
    
    
    @if ($age >= 18)
        <p>তুমি Adult।</p>
    @else
        <p>তুমি Child।</p>
    @endif

    @if ($isStudent)
        <p>তুমি এখনো Student।</p>
    @else
        <p>তুমি Professional।</p>
    @endif

    <h3>তোমার Skills:</h3>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>
</body>
</html>