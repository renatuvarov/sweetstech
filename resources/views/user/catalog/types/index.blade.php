<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        @foreach($types as $type)
            <a class="col col-md-4" href="{{ route('user.categories.show', ['slug' => $type->slug]) }}">
                <h3>{{ $type->name_en }}</h3>
                <div>
                    <img src="{{ asset($type->img) }}" alt="" class="img-fluid">
                </div>
            </a>
        @endforeach
    </div>
</div>
</body>
</html>
