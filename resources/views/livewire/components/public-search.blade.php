<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group rounded-pill mb-3 shadow-sm p-3 bg-body rounded">
                    <span class="input-group-text text-muted bg-white border-0"> <i class="ri-search-line"></i></span>
                    <input type="search" wire:model="data" wire:keydown='query'
                        class="form-control border-0  rounded-5 me-4 " placeholder="Search...">
                </div>
            </div>
        </div>
        @if (!empty($data))
            <div class="row justify-content-center pt-3">
                <div class="col-md-8">

                    <div class="list-group">
                        @forelse($results as $item)
                            <a href="
                            @if ($item->category->id == '1') {{ route('root.show.stays', $item->id) }}
                            @elseif ($item->category->id == '2')
                             {{ route('root.show.flights', $item->id) }}

                            @elseif ($item->category->id == '3')
                             {{ route('root.show.attractions', $item->id) }}

                            @elseif ($item->category->id == '4')
                             {{ route('root.show.taxi', $item->id) }}

                            @else
                             {{ route('root.show.carrent', $item->id) }} @endif
                            "
                                class="list-group-item list-group-item-action">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/uploads/' . $item->image->image) }}" width="80"
                                        height="80" alt="" srcset="">
                                    <div class=" flex-column w-100 ps-2 align-items-start ">
                                        <div class="d-flex  justify-content-between">
                                            <h5 class="mb-1 pe-1 pt-1">{{ $item->name }}</h5>
                                            <small>{{ $item->district->name }}</small>
                                        </div>
                                        <p class="mb-1">{{ $item->category->name }}</p>
                                        <small> <span class="text-primary">
                                                {{ $item->listings->count() }} Listing Available</span></small>
                                    </div>
                                </div>

                            </a>
                        @empty
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="text-center text-muted">EMPTY</div>
                            </a>
                        @endforelse

                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
