@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-p-dark text-p-light cursor-default leading-5 rounded-md opacity-50">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-p-dark text-p-light leading-5 rounded-md hover:opacity-80 focus:outline-none focus:ring ring-blue-700 focus:border-blue-400 active:opacity-60 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium bg-p-dark text-p-light leading-5 rounded-md hover:opacity-80 focus:outline-none focus:ring ring-blue-700 focus:border-blue-400 active:opacity-60 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium bg-p-dark text-p-light cursor-default leading-5 rounded-md opacity-50">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-p-light leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium bg-p-dark text-p-light cursor-default rounded-l-md leading-5 opacity-50" aria-hidden="true">
                                <x-icon name="chevron-left" class="w-5 h-5" />
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium bg-p-dark text-p-light rounded-l-md leading-5 hover:opacity-80 focus:z-10 focus:outline-none focus:ring ring-blue-700 focus:border-blue-400 active:opacity-60 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <x-icon name="chevron-left" class="w-5 h-5" />
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-p-dark text-p-light cursor-default leading-5 opacity-50">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-p-dark text-p-light cursor-default leading-5 opacity-80">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-p-dark text-p-light leading-5 hover:opacity-80 focus:z-10 focus:outline-none focus:ring ring-blue-700 focus:border-blue-400 active:opacity-60 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-p-dark text-p-light rounded-r-md leading-5 hover:opacity-80 focus:z-10 focus:outline-none focus:ring ring-blue-700 focus:border-blue-400 active:opacity-60 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <x-icon name="chevron-right" class="w-5 h-5" />
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium bg-p-dark text-p-light cursor-default rounded-r-md leading-5 opacity-50" aria-hidden="true">
                                <x-icon name="chevron-right" class="w-5 h-5" />
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
