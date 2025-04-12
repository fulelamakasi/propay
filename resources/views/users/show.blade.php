
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
    <li><a href="{{ URL::to('users') }}">View All Users</a></li>
    <li><a href="{{ URL::to('users/create') }}">Create a User</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('logout') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"> Logout</a></li>
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
