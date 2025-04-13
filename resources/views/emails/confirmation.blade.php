<!DOCTYPE html>
<html>
<head>
    <title>User Creation/Modification Email</title>
</head>
<body>
    <h1>User Creation or Modifications</h1>
    <p>Good day {{ $newUser->name }},</p>
    <p>User {{ $user->name }} has made a few modifications to your user.</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Name</td>
                <td>Surname</td>
                <td>Mobile Number</td>
                <td>ID Number</td>
                <td>Email</td>
                <td>Birth Date</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $newUser->name }}</td>
                <td>{{ $newUser->surname }}</td>
                <td>{{ $newUser->mobile_number }}</td>
                <td>{{ str_replace(substr($newUser->id_number, 6, 11), "*****", $newUser->id_number) }}</td>
                <td>{{ $newUser->email }}</td>
                <td>{{ $newUser->birth_date }}</td>
            </tr>
        </tbody>
    </table>
    <p>If this was not as per request please do not hesitate to contact {{ env('SUPPORT_EMAIL') }}</p>
    <p>Kind Regards, <br> The Propay Team.</p>
</body>
</html>