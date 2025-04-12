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

<h1>Edit {{ $user->name }}</h1>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<!-- if there are creation errors, they will show here -->
<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PUT')
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $user->name }}"><br>
    <label for="name">Surname:</label><br>
    <input type="text" required id="surname" name="surname" value="{{ $user->surname }}"><br>
    <label for="name">Mobile Number:</label><br>
    <input type="number" required id="mobile_number" name="mobile_number" value="{{ $user->mobile_number }}"><br>
    <label for="name">ID Number:</label><br>
    <input type="text" required max="13" id="id_number" name="id_number" value="{{ $user->id_number }}"><br>
    <label for="name">Email:</label><br>
    <input type="email" required id="email" name="email" value="{{ $user->email }}"><br>
    <label for="name">Language:</label><br>

    <select id="language_id" required name="language_id">
        <option value="">Choose One</option>

        @foreach($languages as $key => $value)
            @if($value->id == $user->language_id)
                <option selected value="{{ $value->id }}">{{ $value->name  }}</option>
            @else
                <option value="{{ $value->id }}">{{ $value->name  }}</option>
            @endif
            
        @endforeach
    </select><br>
    <label for="name">New Password:</label><br>
    <input type="password" id="password" name="password" value=""><br>
    <label for="name">Confirm Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" value=""><br>
    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
