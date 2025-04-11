
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
        <a class="navbar-brand" href="{{ URL::to('users') }}">user Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All users</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a user</a>
    </ul>
</nav>

<h1>Showing {{ $user->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $user->name }} {{ $user->surname }}</h2>
        <p>
        <a class="btn btn-small btn-info" href="{{ URL::to('user_interest/' . $user->id . '/byUser') }}">View User Interests</a> <br/>
            <strong>ID Number:</strong> {{ $user->id_number }}<br>
            <strong>Birth Date:</strong> {{ $user->birth_date }}<br>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Mobile Number:</strong> {{ $user->mobile_number }}<br>
            <strong>Language:</strong> {{ $user->language->name }}<br>
            <strong>Created:</strong> {{ $user->created_at }}<br>
            <strong>Updated:</strong> {{ $user->updated_at }}<br>
        </p>
    </div>

</div>
</body>
</html>
