
<!DOCTYPE html>
<html>
<head>
    <title>Propay App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('languages') }}">language Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('languages') }}">View All languages</a></li>
        <li><a href="{{ URL::to('languages/create') }}">Create a language</a>
    </ul>
</nav>

<h1>Showing {{ $language->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $language->name }}</h2>
        <p>
            <strong>Created:</strong> {{ $language->created_at }}<br>
            <strong>Updated:</strong> {{ $language->updated_at }}<br>
        </p>
    </div>

</div>
</body>
</html>