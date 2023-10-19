<div>
    {{-- The whole world belongs to you. --}}
    @section('bread')
        <div class="page-breadcrumb ">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Books</h3>
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
        <div wire:click.prevent="switch('all')" class="col-lg-4 col-md-4">
            <div class="card @if ($folder == 'all') border border-primary @endif ">
                <div class="card-body @if ($folder == 'all') @else  bg-primary @endif ">
                    <div class="h4">Books</div>
                    <div class="h5">{{ $books->count() }}</div>

                </div>
            </div>
        </div>
        <div wire:click.prevent="switch('borrowed')" class="col-lg-4 col-md-4">
            <div class="card  @if ($folder == 'borrowed') border border-info @endif ">
                <div class="card-body @if ($folder == 'borrowed') @else  bg-info @endif ">
                    <div class="h4">Borrow Sessions</div>
                    <div class="h5">{{ $borrowed_sessions->count() }}</div>
                </div>
            </div>
        </div>
        <div wire:click="switch('lost')" class="col-lg-4 col-md-4">
            <div class="card @if ($folder == 'lost') border border-warning @endif ">
                <div class="card-body @if ($folder == 'lost') @else  bg-warning @endif ">
                    <div class="h4">Lost</div>
                    <div class="h5">{{ $lost_books->count() }}</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                <div class="form-group pr-1">
                    <input wire:model="search" type="search" placeholder="search" class="form-control">
                </div>
                <div class="form-group">
                    <div class="btn-group">
                        {{-- modal button --}}
                        <button class="btn btn-primary form-control" wire:click='create'>
                            <span wire:loading wire:target="create" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            add
                        </button>
                        <button class="btn btn-outline-primary form-control" wire:click='borrow'>
                            <span wire:loading wire:target="borrow" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            Borrow
                        </button>


                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body p-0 ">

                    @if ($folder == 'all')
                        <table class="table  table-inverse table-hover table-responsive-sm ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Isbn</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $index => $item)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td> @if($item->status=='available') <i class="fa fa-check-circle text-success" aria-hidden="true"></i> @else <i class="fa fa-ban text-danger" aria-hidden="true"></i> @endif  {{ $item->title }}</td>
                                        <td>{{ $item->author }} </td>
                                        <td>{{ $item->isbn }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a class="dropdown-item" wire:click='edit({{ $item->id }})'
                                                        href="#">
                                                        <span wire:loading wire:target="edit"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Edit
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted h3 text-center">EMPTY</td>

                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    @endif

                    @if ($folder == 'borrowed')
                        <table class="table  table-inverse table-hover table-responsive-sm ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Days Left</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($borrowed_sessions as $index => $item)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $item->student->name}} <span class="font-bold" > ({{ $item->student->academiclog->classroom->crt->name ?? "Unknown" }} {{ $item->student->academiclog->classroom->name ??"unknown" }})</span></td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->days_left() }} </td>
                                        <td> <span class="badge text-white text-capitalize @if($item->status == 'borrowed') bg-success @else  bg-danger @endif" >{{ $item->status }}</span></td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a class="dropdown-item"
                                                        href="{{ route('library.session',$item->id) }}">
                                                        
                                                        Edit
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted h3 text-center">EMPTY</td>

                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    @endif

                    @if ($folder == 'lost')
                        <table class="table  table-inverse table-hover table-responsive-sm ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Isbn</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lost_books as $index => $item)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td> @if($item->status=='available') <i class="fa fa-check-circle text-success" aria-hidden="true"></i> @else <i class="fa fa-ban text-danger" aria-hidden="true"></i> @endif  {{ $item->title }}</td>
                                        <td>{{ $item->author }} </td>
                                        <td>{{ $item->isbn }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a class="dropdown-item" wire:click='edit({{ $item->id }})'
                                                        href="#">
                                                        <span wire:loading wire:target="edit"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Edit
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-muted h3 text-center">EMPTY</td>

                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    @endif

                    

                    {{-- addmodal --}}
                    <div class="modal long-modal "@if ($addmodal) style="display:block" @endif
                        tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" wire:click='cancel'>
                                        <span aria-hidden="true">&times;</span>
                                        <span wire:loading wire:target="cancel"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body" style="">
                                    <div class="text-center h3 ">
                                        Add Book
                                    </div>
                                    <form wire:submit.prevent="store">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror "
                                                wire:model.defer="title">
                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input type="text"
                                                class="form-control @error('author') is-invalid @enderror "
                                                wire:model.defer="author">
                                            @error('author')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">ISBN</label>
                                            <input type="text"
                                                class="form-control @error('isbn') is-invalid @enderror "
                                                wire:model.defer="isbn">
                                            @error('isbn')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number"
                                                class="form-control @error('price') is-invalid @enderror "
                                                wire:model.defer="price">
                                            @error('price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark text-white form-control">
                                                <span wire:loading wire:target="store">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                </span>
                                                Save
                                            </button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- addmodal --}}
                    {{-- editmodal --}}
                    <div class="modal long-modal "@if ($editmodal) style="display:block" @endif
                        tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" wire:click='cancel'>
                                        <span aria-hidden="true">&times;</span>
                                        <span wire:loading wire:target="cancel"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body" style="">
                                    <div class="text-center h3 ">
                                        Edit book
                                    </div>
                                    <form wire:submit.prevent="update">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text"
                                                class="form-control @error('title') is-invalid @enderror "
                                                wire:model.defer="title">
                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input type="text"
                                                class="form-control @error('author') is-invalid @enderror "
                                                wire:model.defer="author">
                                            @error('author')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">ISBN</label>
                                            <input type="text"
                                                class="form-control @error('isbn') is-invalid @enderror "
                                                wire:model.defer="isbn">
                                            @error('isbn')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text"
                                                class="form-control @error('price') is-invalid @enderror "
                                                wire:model.defer="price">
                                            @error('price')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark text-white form-control">
                                                <span wire:loading wire:target="update">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                </span>
                                                update
                                            </button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- editmodal --}}

                    {{-- borrowmodal --}}
                    <div class="modal long-modal "@if ($borrowmodal) style="display:block" @endif
                        tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" wire:click='cancel'>
                                        <span aria-hidden="true">&times;</span>
                                        <span wire:loading wire:target="cancel"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center h3 ">
                                        Borrow Session
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form wire:submit.prevent="add_book_session">
                                                <div class="form-group" style="position:relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Search Student ..." wire:model="studentsearch">

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
                                                    <input type="text" class="form-control"
                                                        placeholder="Search ..." wire:model="booksearch">

                                                    @if ($booksearchlist)
                                                        <div>
                                                            <div class="list-group ">
                                                                @foreach ($bookcollection as $item)
                                                                    <a href="#"
                                                                        wire:click.prevent="selectbook({{ $item->id }})"
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
                                                    <input type="date" readonly wire:model="borrow_date"
                                                        class="form-control">
                                                    @error('borrow_date')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Number of Days</label>
                                                    <input type="number" wire:model="number_of_days"
                                                        class="form-control">
                                                    @error('number_of_days')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Return Date</label>
                                                    <input type="date" wire:model="return_date"
                                                        class="form-control">
                                                    @error('return_date')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-dark text-white form-control">
                                                        <span wire:loading wire:target="add_book_session">
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                        </span>
                                                        update
                                                    </button>
                                                </div>
                                            </form>


                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group pb-2">
                                                <li
                                                    class="list-group-item d-flex-column justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span>Student :</span>
                                                        <h5>{{ $selectedStudent->name ?? '' }}</h5>
                                                    </div>

                                                </li>
                                            </ul>
                                            <h5>Book Cart</h5>
                                            @forelse ($bookcart as $index => $item)
                                                <ul class="list-group pt-1">
                                                    <li
                                                        class="list-group-item d-flex  justify-content-between align-items-center ">
                                                        <div>
                                                            <i class="fa fa-book" aria-hidden="true"></i><span>
                                                                {{ $item['title'] }}</span>
                                                        </div>
                                                        <a href="#" class="text-danger"
                                                            wire:click.prevent="remove_book({{ $index }})"><i
                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                            @empty
                                                <ul class="list-group pt-1">
                                                    <li
                                                        class="list-group-item d-flex  text-center text-muted justify-content-center align-items-center ">
                                                        EMPTY
                                                    </li>

                                                </ul>
                                            @endforelse



                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- editmodal --}}

                </div>
            </div>
        </div>
    </div>

</div>
