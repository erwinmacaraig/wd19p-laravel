<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample</title>
</head>

<body>
    <div>
        {{ date("j, n, Y") }}
        <br>
        <label>Add 3 and 7 is {{ 3 +7 }}</label>
    </div>
    <div>
        <?php foreach ($grades as $subject => $score) : ?>
            <p>{{$subject}} => {{$score}}</p>
        <?php endforeach ?>
    </div>
</body>

</html>