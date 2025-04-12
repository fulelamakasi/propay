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
        <li><a href="{{ URL::to('interests') }}">View All Interests</a></li>
        <li><a href="{{ URL::to('interests/create') }}">Create an Interest</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('logout') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"> Logout</a></li>
    </ul>
</nav>

<h1>Edit {{ $interest->name }}</h1>

<!-- if there are creation errors, they will show here -->
<form method="POST" action="/interests/{{ $interest->id }}">
    @csrf
    @method('PUT')
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $interest->name }}"><br>
    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
