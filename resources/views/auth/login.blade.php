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
                <div><h4>Авторизация</h4></div>
                <form action="{{ route('login')}}" method="POST">
                    @csrf
                    <div class="results">
                        @if (Session::get('fail'))
                        <div class="aler alert-danger">
                            {{ Session::get('fail')}}
                        </div>
                    @endif
                        
                    </div>
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control" name="login" placeholder="Enter email">
                        <span class="text-danger">
                            @error('login')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Войти</button>
                    </div>
                </form>
                <div>
                    {{-- <a href="{{route('main')}}"><button class="btn btn-primary">На главную</button></a> --}}
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>