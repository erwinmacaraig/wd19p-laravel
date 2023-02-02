<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
</head>

<body>
    <h1>{{$u->strFullName}}</h1>
    <form action="{{route('edit-save-user')}}" method="POST">
        <input type="hidden" name="intMemberId" value="{{$u->intMemberId}}">
        <div>
            <label>Specify Full Name</label>
            <input type="text" name="full-name" value="{{$u->strFullName}}">
        </div>
        <div>
            <label>Gender</label>
            <?php if ($u->gender == 'F') : ?>
                <label><input type="radio" name="gender" value="F" checked>Female</label>
                <label><input type="radio" name="gender" value="M">Male</label>
            <?php else : ?>
                <label><input type="radio" name="gender" value="F">Female</label>
                <label><input type="radio" name="gender" value="M" checked>Male</label>
            <?php endif ?>
        </div>
        <div>
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{$u->dteDOB}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
        {{ csrf_field() }}
    </form>
</body>

</html>