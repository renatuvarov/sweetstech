@if ($paginator->hasPages())
        <div class="pagination text-center">
            @if ($paginator->onFirstPage())
                <span>@lang('pagination.previous')</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            @else
                <a>@lang('pagination.next')</a>
            @endif
        </div>
@endif
