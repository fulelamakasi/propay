
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

<h1>All the User Interests</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>User</td>
            <td>Interest</td>
            <td>Created</td>
            <td>Updated</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($user_interests as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->user->name }} {{ $value->user->surname }}</td>
            <td>{{ $value->interest->name }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('user_interest/' . $value->id) }}">Show this user</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('user_interest/' . $value->id . '/edit') }}">Edit this user</a>

                <form action="{{ route('user_interest.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-small btn-danger" onclick="this.closest('form').submit();return false;">Delete this user</a>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>