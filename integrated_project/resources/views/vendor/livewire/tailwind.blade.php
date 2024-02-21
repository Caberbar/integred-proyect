@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div class="row">
    @if ($paginator->hasPages())
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dom-jqry_info" role="status" aria-live="polite">
            <span>{!! __('Showing') !!}</span>
            <span>{{ $paginator->firstItem() }}</span>
            <span>{!! __('to') !!}</span>
            <span>{{ $paginator->lastItem() }}</span>
            <span>{!! __('of') !!}</span>
            <spanc>{{ $paginator->total() }}</span>
                <span>{!! __('results') !!}</span>
        </div>
    </div>

    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dom-jqry_paginate">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" id="dom-jqry_previous">
                    <a href="#" aria-disabled="true" aria-label="{{ __('pagination.previous') }}" aria-hidden="true" class="page-link">Previous</a>
                </li>
                @else
                <li class="paginate_button page-item previous" id="dom-jqry_previous">
                    <a href="#" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" aria-label="{{ __('pagination.previous') }}" class="page-link">Previous</a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 select-none">{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="paginate_button page-item active" id="dom-jqry_previous" wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}" aria-current="page">
                    <a href="#" class="page-link">{{ $page }}</a>
                </li>
                    @else
                    <li class="paginate_button page-item">
                    <a href="#" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="page-link"{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                </li>
                    @endif
                @endforeach
                @endif
                @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item previous" id="dom-jqry_previous">
                    <a href="#" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="page-link" aria-label="{{ __('pagination.next') }}">Next</a>
                </li>
                    @else
                    <li class="paginate_button page-item previous disabled" id="dom-jqry_previous">
                    <a href="#" aria-disabled="true" aria-label="{{ __('pagination.next') }}" aria-hidden="true" class="page-link">Next</a>
                </li>
                    @endif
            </ul>
        </div>
    </div>
    @endif
</div>