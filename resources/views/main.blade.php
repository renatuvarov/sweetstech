<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('user.search.count') }}" method="get">
    <input type="text" name="st_title" value="{{ old('st_title') }}"><br>
    @foreach($tags as $tag)
        <label for="{{ $tag->name_en }}">{{ $tag->name_en }}</label>
        <input type="checkbox" name="st_categories[]" id="{{ $tag->name_en }}" value="{{ $tag->id }}">
        <br>
    @endforeach
    @error('st_categories.*')
    <p>{{ $message }}</p>
    @enderror
    <button type="submit">search</button>
</form>
</body>
</html>
