<div>
    {{-- Be like water. --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="input-group rounded-pill mb-3 shadow-sm p-3 bg-body rounded">
                <span class="input-group-text text-muted bg-white border-0"> <i class="ri-search-line"></i></span>
                <input type="text" wire:model='search' class="form-control border-0  rounded-5 me-4 "
                    placeholder="Search...">
            </div>

        </div>
    </div>


    <div class="row  pt-3">



        @forelse($packages as $item)
            <div class="col-lg-4 col-md-6">

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
                    class="text-dark">
                    <div class="card shadow bg-light">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/uploads/' . $item->image->image) }}" width="100" height="100"
                                        alt="">
                                    <div class="d-flex w-100 flex-column ps-3">
                                        <div class="d-flex  justify-content-between">
                                            <h5 class="text-dark">{{ $item->name }}</h4>
                                                <span>{{ $item->category->name }}</span>
                                        </div>
                                        <span>{{ $item->district->name }}</span>
                                        <span class="text-primary">
                                            {{ $item->listings->count() }} Listing Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-lg-12 p-2">
                <div class="card shadow bg-light">
                    <div class="card-body">
                        <div class="h4 text-muted">EMPTY</div>
                    </div>
                </div>
            </div>
        @endforelse




    </div>

    <div class="row justify-content-center pt-4">
        <div class="col-md-8">
            {{ $packages->links() }}
        </div>
    </div>
</div>
