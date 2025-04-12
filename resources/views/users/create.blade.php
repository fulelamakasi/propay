
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

<h1>Create a User</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
<form method="POST" action="/users">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" required id="name" name="name" value="{{ old('name') }}"><br>
    <label for="name">Surname:</label><br>
    <input type="text" required id="surname" name="surname" value="{{ old('surname') }}"><br>
    <label for="name">Mobile Number:</label><br>
    <input type="number" required id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"><br>
    <label for="name">ID Number:</label><br>
    <input type="text" required max="13" id="id_number" name="id_number" value="{{ old('id_number') }}"><br>
    <label for="name">Email:</label><br>
    <input type="email" required id="email" name="email" value="{{ old('email') }}"><br>
    <label for="name">Language:</label><br>

    <select id="language_id" name="language_id">
        <option value="">Choose One</option>

        @foreach($languages as $key => $value)
            <option value="{{ $value->id }}">{{ $value->name  }}</option>
        @endforeach
    </select><br>

    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
