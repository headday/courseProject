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
            <div class="col-md-6 col-md-offset-3">
               <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                <div class="form-group">
                    <label for="title">Имя курса</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter lid">
                </div>
                <div class="form-group">
                    <label for="desc">Описание</label>
                    <input type="text" class="form-control" name="desc" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="count">Количество участников</label>
                    <input type="text" class="form-control" name="count" placeholder="Enter content">
                </div>
                <div class="form-group">
                    <label for="date_of_start">Дата начала</label>
                    <input type="date" class="form-control" name="date_of_start" placeholder="Enter rubrics">
                </div>
                <div class="form-group">
                    <label for="_file">Картинка</label>
                    <input type="file" class="form-control" name="_file" id="_file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Добавить</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>