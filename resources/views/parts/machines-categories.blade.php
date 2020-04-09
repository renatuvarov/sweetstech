<div class="last-element">
    <div class="widget-sidebar-cat categories-list">
        <h5 class="sidebar-title">Categories</h5>
        <div class="sidebar-content">
            <ul class="list-sidebar-cat">
                <li>
                    <a href="{{ route('user.catalog.index') }}">
                        <button class="categories-all">All Categories</button>
                    </a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('user.tags.show', ['slug' => $category['slug']]) }}">
                            <button class="categories-all">{{ \Illuminate\Support\Str::ucfirst($category['name_en']) }}</button>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
