
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

<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surname</td>
            <td>Mobile Number</td>
            <td>ID Number</td>
            <td>Email</td>
            <td>Birth Date</td>
            <td>Language</td>
            <td>Created</td>
            <td>Updated</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->surname }}</td>
            <td>{{ $value->mobile_number }}</td>
            <td>{{ str_replace(substr($value->id_number, 6, 11), "*****", $value->id_number) }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->birth_date }}</td>
            <td>{{ $value->language->name }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this user</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this user</a>

                <form action="{{ route('users.destroy', $value->id) }}" method="post">
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