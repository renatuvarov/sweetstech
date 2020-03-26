<ul>
@foreach($categories as $category)
    <li><a href="{{ route('ru.user.tags.show', ['slug' => $category->slug]) }}">{{ $category->name_ru }}</a></li>
@endforeach
</ul>
