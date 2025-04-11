
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

<h1>Create a interest</h1>

<!-- if there are creation errors, they will show here -->
<form method="POST" action="/interests">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
