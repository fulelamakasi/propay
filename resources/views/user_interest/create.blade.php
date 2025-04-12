
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
        <a class="navbar-brand" href="{{ URL::to('dashboard') }}">Propay</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user_interest') }}">View All User Interests</a></li>
        <li><a href="{{ URL::to('user_interest/create') }}">Create a User Interest</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('logout') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"> Logout</a></li>
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
