@if ($paginator->hasPages())
    <div class="ui pagination menu">
        {{-- Link to previous page --}}
        @if ($paginator->onFirstPage())
            <a class="disabled item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&laquo;</span>
            </a>
        @else
            <a class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
        @endif

        {{-- Links to current page and surrounding pages --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled item" aria-disabled="true"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active item" aria-current="page"><span>{{ $page }}</span></a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Link to next page --}}
        @if ($paginator->hasMorePages())
            <a class="item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
        @else
            <a class="disabled item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&raquo;</span>
            </a>
        @endif
    </div>
@endif