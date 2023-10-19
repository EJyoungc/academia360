<div>
    {{-- In work, do what you enjoy. --}}

    @section('bread')
        <div class="page-breadcrumb pb-5">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Classes</h3>
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
        <div class="col-md-12 col-lg-12">

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
                                    <div class="modal-body" style=" height:300px">
                                        <div class="text-center h3 ">
                                            Add Class Type
                                        </div>
                                        <form wire:submit.prevent="store">

                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="name"
                                                    wire:model="name"class="form-control  @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                                <div class="form-group">
                                                    <label for="">Level</label>
                                                    <select type="text" class="form-control"
                                                        wire:model.defer="level">
                                                        <option value="">Select Level</option>
                                                        @forelse ($levels as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @empty
                                                            <option value="">Empty</option>
                                                        @endforelse
                                                    </select>
                                                    <x-error for="level" />
                                                </div>
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
                        <div class="modal long-modal "@if ($updatemodal) style="display:block" @endif
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
                                    <div class="modal-body" style="height:auto">
                                        <div class="text-center h3 ">
                                            Edit class
                                        </div>
                                        <form wire:submit.prevent="update">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text"
                                                    wire:model="name"class="form-control  @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select type="text" class="form-control" wire:model.defer="level">
                                                    <option value="">Select Level</option>
                                                    @forelse ($levels as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @empty
                                                        <option value="">Empty</option>
                                                    @endforelse
                                                </select>
                                                <x-error for="level" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-dark text-white form-control">
                                                    <span wire:loading wire:target="update">
                                                        <span class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                    </span>
                                                    save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- editmodal --}}
                        {{-- addclassroommodal --}}
                        <div class="modal long-modal "@if ($addclassmodal) style="display:block" @endif
                            tabindex="-1" role="dialog">
                            <div class="modal-dialog " role="document">
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
                                    <div class="modal-body" style="height:auto">
                                        <div class="text-center h3 ">
                                            Add ClassRoom
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <form wire:submit.prevent="classroom_store">
                                                <div class="form-group">
                                                    <label for="">Classroom Name</label>
                                                    <input type="text"
                                                        wire:model="name"class="form-control  @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-dark text-white form-control">
                                                        <span wire:loading wire:target="classroom_store">
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                        </span>
                                                        add
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- addclassroommodal --}}
                        {{-- updateclassroommodal --}}
                        <div class="modal long-modal "@if ($updateclassmodal) style="display:block" @endif
                            tabindex="-1" role="dialog">
                            <div class="modal-dialog " role="document">
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
                                    <div class="modal-body" style="height:auto">
                                        <div class="text-center h3 ">
                                            Edit Class Room
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <form wire:submit.prevent="classroom_update">
                                                <div class="form-group">
                                                    <label for="">Classroom Name</label>
                                                    <input type="text"
                                                        wire:model="name"class="form-control  @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-dark text-white form-control">
                                                        <span wire:loading wire:target="classroom_store">
                                                            <span class="spinner-border spinner-border-sm"
                                                                role="status" aria-hidden="true"></span>
                                                        </span>
                                                        add
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- updateclassroommodal --}}
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-body p-0">
                    <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                        <table class="table table-hover  ">
                            <thead class="thead-light">
                                <th>#</th>
                                <th>Class</th>
                                <th>Level</th>
                                <th>Classroom</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @forelse ($crt as $index => $item1 )
                                    <tr>
                                        <td>{{ $index }}</td>
                                        
                                        <td>{{ $item1->name }}</td>
                                        <td>{{ $item1->level->name ?? '' }}</td>
                                        <td>
                                            <ul>
                                                @forelse($item1->classrooms as $item)
                                                    <li>

                                                        <div class="dropdown ">
                                                            <a href="#" type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ $item->name }}
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('class.show', $item->id) }}">View</a>
                                                                <a class="dropdown-item"
                                                                    wire:click="editClass({{ $item->id }})"
                                                                    href="#">Edit</a>

                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary " type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="createClass({{ $item1->id }})"
                                                        href="#">Add</a>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="edit({{ $item1->id }})"
                                                        href="#">Edit</a>

                                                </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-muted">EMPTY</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
