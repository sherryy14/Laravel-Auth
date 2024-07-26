@if ($paginator->hasPages())
    <div class="pagination-wrapper centred">
        <ul class="pagination clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a href="#" class="disabled">Prev</a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="disabled">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @else
                <li><a href="#" class="disabled">Next</a></li>
            @endif
        </ul>
    </div>
@endif
