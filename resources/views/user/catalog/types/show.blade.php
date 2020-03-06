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
    <h1>{{ $type->name_en }}</h1>
    <div class="row">
        @foreach($machines as $machine)
            <a class="col col-md-4" href="{{ route('user.catalog.show', ['slug' => $machine->slug]) }}">
                <h3>{{ $machine->name_en }}</h3>
                <div>
                    <img src="{{ asset($machine->img) }}" alt="" class="img-fluid">
                </div>
            </a>
        @endforeach
    </div>
    {{ $machines->links() }}
</div>
</body>
</html>
