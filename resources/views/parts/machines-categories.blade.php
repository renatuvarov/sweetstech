<div class="last-element">
    <div class="widget-sidebar-cat categories-list">
        <h5 class="sidebar-title">All Categories</h5>
        <div class="sidebar-content">
            <ul class="list-sidebar-cat">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('user.tags.show', ['slug' => $category->slug]) }}">
                            <button class="categories-all">{{ $category->name_en }}</button>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
