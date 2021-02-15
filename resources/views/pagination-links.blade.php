@if ($paginator->hasPages())
<ul class="d-flex justify-content-between">
    @if ($paginator->onFirstPage())
    <button class="btn btn-light">prev</button>
    @else
    <button class="w-16 px-2 py-1 rounded border shadow btn-dark" wire:click="previousPage">prev</button>
    @endif

    @foreach($elements as $element)
    @foreach($element as $page => $url)
    @if($page == $paginator->currentPage())
    <button class="btn btn-primary" wire:click="gotoPage({{$page}})">{{$page}}</button>
    @else
    <button class="btn btn-secondary" wire:click="gotoPage({{$page}})">{{$page}}</button>
    @endif
    @endforeach
    @endforeach

    @if ($paginator->hasMorePages())
    <button class="w-16 px-2 py-1  rounded border shadow btn-dark" wire:click="nextPage">next</button>
    @else
    <button class="btn btn-light">next</button>
    @endif
</ul>
@endif
