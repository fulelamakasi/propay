
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
        <a class="navbar-brand" href="{{ URL::to('interests') }}">interest Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('interests') }}">View All interests</a></li>
        <li><a href="{{ URL::to('interests/create') }}">Create a interest</a>
    </ul>
</nav>

<h1>Showing {{ $interest->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $interest->name }}</h2>
    </div>

</div>
</body>
</html>