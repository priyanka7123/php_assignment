<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-4"></div>
           <div class="col-lg-4 mt-5">
               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
                <p class="lead text-center  fst-italic">Create an account</p>
               <div class="card shadow p-3 mb-5 bg-white rounded">
                   <div class="card-body">

                       <form action="{{route('insert')}}" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="">Name</label>
                              <input type="text" name="name" value="{{old('name')}}" class="form-control
                              @if($errors->has('name'))is-invalid @endif">
                     <label for="" class="small text-danger">{{$errors->first('name')}}</label>
                          </div>
                          <div class="mb-3">
                              <label for="">Email</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control">
                          </div>
                          <div class="mb-3">
                              <label for="">Password</label>
                              <input type="password" name="password" value="{{old('password')}}" class="form-control
                               @if($errors->has('password'))is-invalid @endif">
                     <label for="" class="small text-danger">{{$errors->first('password')}}</label>
                          </div>
                          <div class="mb-3">
                              <input type="submit" name="register" value="register" class="btn btn-danger w-100">
                          </div>
                      </form>
                   </div>
                   <div class="card-footer">
                        <a href="{{route('index')}}" class="nav-link text-center">Already have an account?Sigin</a>

                   </div>
                </div>
           </div>
       </div>

   </div>
</body>
</html>
