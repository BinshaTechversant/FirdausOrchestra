
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>

    <h1>Email Content</h1>

    @if(isset($content))
        <p>{{ $content }}</p>
    @else
        <p>Default Content</p>
    @endif

    <p>Additional content</p>

</body>
</html>