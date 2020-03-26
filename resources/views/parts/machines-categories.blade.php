<ul>
@foreach($categories as $category)
        <li><a href="{{ route('user.tags.show', ['slug' => $category->slug]) }}">{{ $category->name_en }}</a></li>
@endforeach
</ul>
