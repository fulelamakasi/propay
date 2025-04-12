
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
        <a class="navbar-brand" href="{{ URL::to('user_interest') }}">user_interest Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user_interest') }}">View All user_interests</a></li>
        <li><a href="{{ URL::to('user_interest/create') }}">Create a user_interest</a>
    </ul>
</nav>

<h1>Create a User Interest</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
<form method="POST" action="/user_interest">
    @csrf
    <label for="name">User:</label><br>

    <select id="user_id" required name="user_id">
        <option value="">Choose One</option>

        @foreach($users as $key => $value)
            <option value="{{ $value->id }}">{{ $value->name }}{{ $value->surname }}</option>
        @endforeach
    </select><br>
    <label for="name">Interest:</label><br>

    <select id="interest_id" required name="interest_id">
        <option value="">Choose One</option>

        @foreach($interests as $key => $value)
            <option value="{{ $value->id }}">{{ $value->name  }}</option>
        @endforeach
    </select><br>

    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
