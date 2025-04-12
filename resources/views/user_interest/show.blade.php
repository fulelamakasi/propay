
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
        <a class="navbar-brand" href="{{ URL::to('user_interest') }}">user Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user_interest') }}">View All users</a></li>
        <li><a href="{{ URL::to('user_interest/create') }}">Create a user</a>
    </ul>
</nav>

<h1>Showing {{ $user_interest->interest->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $user_interest->user->name }} {{ $user_interest->user->surname }}</h2>
        <p>
            <strong>User:</strong> {{ $user_interest->user->name }}<br>
            <strong>Interest:</strong> {{ $user_interest->interest->name }}<br>
            <strong>Created:</strong> {{ $user_interest->created_at }}<br>
            <strong>Updated:</strong> {{ $user_interest->updated_at }}<br>
        </p>
    </div>

</div>
</body>
</html>
