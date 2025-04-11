
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
        <a class="navbar-brand" href="{{ URL::to('interests') }}">interest Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('interests') }}">View All interests</a></li>
        <li><a href="{{ URL::to('interests/create') }}">Create an interest</a>
    </ul>
</nav>

<h1>All the Interests</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Created</td>
            <td>Updated</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($interests as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('interests/' . $value->id) }}">Show this interest</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('interests/' . $value->id . '/edit') }}">Edit this interest</a>

                <form action="{{ route('interests.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-small btn-danger" onclick="this.closest('form').submit();return false;">Delete this interest</a>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>