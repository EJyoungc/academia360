<div>
    {{-- Be like water. --}}
    @section('bread')
        <div class="page-breadcrumb ">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Library Session</h3>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            {{-- <button class="btn btn-primary" wire:click='create'>
                                add<span wire:loading wire:target="create" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                            </button> --}}
                        </nav>
                    </div>
                </div>
            </div>


        </div>
    @endsection


    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <h6>Session Form</h6>
                            <form wire:submit.prevent="add_book_session">
                                <div class="form-group" style="position:relative">
                                    <input type="text" class="form-control" placeholder="Search Student ..."
                                        wire:model="studentsearch">

                                    @if ($studentsearchlist_status)
                                        <div class="w-100" style="position:absolute">

                                            <div class="list-group ">
                                                @foreach ($studentcollection as $item)
                                                    <a href="#"
                                                        wire:click.prevent="selectstudent({{ $item->id }})"
                                                        class="list-group-item list-group-item-action ">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        <strong>{{ $item->name }}</strong>
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif
                                    @error('selectedStudent')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        wire:model="booksearch">

                                    @if ($booksearchlist)
                                        <div>
                                            <div class="list-group ">
                                                @foreach ($bookcollection as $item)
                                                    <a href="#" wire:click.prevent="add_book({{ $item->id }})"
                                                        class="list-group-item list-group-item-action ">
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                        <strong>{{ $item->title }}</strong> -
                                                        {{ $item->author }}</a>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif


                                </div>
                                <div class="form-group">
                                    <label for="">Borrow Date</label>
                                    <input type="date" readonly wire:model="borrow_date" class="form-control">
                                    @error('borrow_date')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Number of Days</label>
                                    <input type="number" wire:model="number_of_days" class="form-control">
                                    @error('number_of_days')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Return Date</label>
                                    <input type="date" wire:model="return_date" class="form-control">
                                    @error('return_date')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark text-white form-control">
                                        <span wire:loading wire:target="add_book_session">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                        </span>
                                        update
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="d-flex justify-content-between align-content-center">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-content-center">
                                        <span>Student: </span>
                                        <div class="pl-1"> {{ $student->name }}</div>
                                    </div>
                                    <div class="d-flex align-content-center">
                                        <span>Class: </span>
                                        <div class="pl-1"> {{ $student->academiclog->classroom->name }}</div>
                                    </div>
                                    <div class="d-flex align-content-center">
                                        <span>Session Status: </span>
                                        <div class="pl-1"> {{ $borrow_session->status }}</div>
                                    </div>


                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Options
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" wire:click.prevent="return_book()">
                                            Return all
                                        </a>
                                        <a class="dropdown-item" href="#" wire:click.prevent="lost_book()">
                                            Lost all
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-center">Books</h5>

                            @foreach ($books_borrowed as $item)
                                <ul class="list-group pt-1">
                                    <li class="list-group-item  d-flex justify-content-between">
                                        <span><i class="fa fa-book" aria-hidden="true"></i>
                                            {{ $item->book->title }}</span><span>{{ $item->status }}</span>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if ($item->status == 'borrowed' || $item->status == 'returned')
                                                    <a class="dropdown-item" href="#"
                                                        wire:click.prevent="remove_book({{ $item->id }})">
                                                        Remove
                                                    </a>
                                                @endif
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="return_book({{ $item->id }})">
                                                    Returned
                                                </a>

                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="lost_book({{ $item->id }})">
                                                    Lost
                                                </a>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
