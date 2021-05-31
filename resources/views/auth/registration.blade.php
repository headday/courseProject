<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px">
            
            <div class="col-md-4 col-md-offset-4">
                <div><h4>Регистрация</h4></div>
                <form action="{{ route('registration')}}" method="POST">
                    @csrf
                    <div class="results">
                        @if (Session::get('fail'))
                        <div class="aler alert-danger">
                            {{ Session::get('fail')}}
                        </div>
                        @endif
                        @if (Session::get('succes'))
                        <div class="aler alert-success">
                            {{ Session::get('succes')}}
                        </div>
                            
                        @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="fio">ФИО</label>
                        <input type="text" class="form-control" name="fio" placeholder="Enter email">
                        <span class="text-danger">
                            @error('fio')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control" name="login" placeholder="Enter email">
                        <span class="text-danger">
                            @error('fio')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="avatar">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Регистрация</button>
                    </div>
                    {{-- <a href="registration">Create an new Account now</a> --}}
                </form>
              {{--   <div>
                    <a href="{{route('main')}}"><button class="btn btn-primary">На главную</button></a>
                </div> --}}
            </div>
            
        </div>
    </div>
</body>
</html>