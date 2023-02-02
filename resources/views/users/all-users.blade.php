<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>

<body>
    <h1>List of All Users in Our Table</h1>
    <div>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>DOB</td>
                <td>Action</td>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>{{$user->intMemberId}}</td>
                    <td>{{$user->strFullName}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->dteDOB}}</td>
                    <td><a href="{{route('edit-user-form', $user->intMemberId)}}">Edit</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</body>

</html>