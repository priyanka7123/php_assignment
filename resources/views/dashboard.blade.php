<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <div class="col-lg-12 text-center mt-5">
            <h1>Hello , {{$data->name}}</h1>


        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        </div>


    </div>
</body>
</html>
