<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @section('bread')
        <div class="page-breadcrumb pb-5">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Academic Years</h3>
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
                                            Add Academic Year
                                        </div>
                                        <form wire:submit.prevent="store">

                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date"
                                                    wire:model.defer="start_date" id="datepicker"  class="form-control   @error('start_date') is-invalid @enderror">
                                                @error('start_date')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">End_Date</label>
                                                <input type="date"
                                                    class="form-control @error('end_date') is-invalid @enderror "
                                                    wire:model.defer="end_date">
                                                @error('end_date')
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
                                    <div class="modal-body" style="height:300px">
                                        <div class="text-center h3 ">
                                            Edit Academic Year
                                        </div>
                                        <form wire:submit.prevent="update">
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date"
                                                    wire:model.defer="start_date"class="form-control  @error('start_date') is-invalid @enderror">
                                                @error('start_date')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">End_Date</label>
                                                <input type="date"
                                                    class="form-control @error('end_date') is-invalid @enderror "
                                                    wire:model.defer="end_date">
                                                @error('end_date')
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
                        {{-- editmodal --}}
                        {{-- termmodal --}}
                        <div class="modal long-modal "@if ($termmodal) style="display:block" @endif
                            tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-xl" role="document">
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
                                            Academic Year Terms
                                        </div>
                                        <div class="row">
                                            {{-- terms --}}
                                            <div class="col-sm-12 col-md-6 col-lg-6 pt-3">
                                                @forelse ($terms as $item)
                                                    <ul class="list-group py-1">
                                                        <li
                                                            class="list-group-item d-flex border border-primary justify-content-between align-items-center">
                                                            {{ $item->name }}
                                                            <small>{{ $item->start_date }}/{{ $item->end_date }}</small>
                                                            <button wire:click="edit_term({{ $item->id }})"
                                                                class="btn btn-sm btn-info">
                                                                <span wire:loading
                                                                    wire:target="edit_term({{ $item->id }})">
                                                                    <span class="spinner-border spinner-border-sm"
                                                                        role="status" aria-hidden="true"></span>
                                                                </span>
                                                                edit
                                                            </button>

                                                        </li>
                                                    </ul>
                                                @empty
                                                    <ul class="list-group">
                                                        <li
                                                            class="list-group-item d-flex justify-content-center h3 text-muted align-items-center">
                                                            EMPTY
                                                        </li>
                                                    </ul>
                                                @endforelse
                                            </div>
                                            {{-- Terms --}}
                                            {{-- terms form --}}
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <form wire:submit.prevent="term_store">
                                                    <div class="form-group">
                                                        <label for="">Term Name</label>
                                                        <input type="text"
                                                            wire:model="t_name"class="form-control  @error('t_name') is-invalid @enderror">
                                                        @error('t_name')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Term Start Date</label>
                                                        <input type="date"
                                                            wire:model="t_start_date"class="form-control  @error('t_start_date') is-invalid @enderror">
                                                        @error('t_start_date')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">End_Date</label>
                                                        <input type="date"
                                                            class="form-control @error('t_end_date') is-invalid @enderror "
                                                            wire:model.defer="t_end_date">
                                                        @error('t_end_date')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-dark text-white form-control">
                                                            <span wire:loading wire:target="store_term">
                                                                <span class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                            </span>
                                                            {{ $btnTitle }}
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                            {{-- terms form --}}
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- termmodal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        @forelse ($academicyears as $item)
            <div class="col-2 col-md-2 col-lg-2  p-1 ">
                <div class="text-center border @if ($item->is_current == 'true') folder-selected border-primary @else border-light @endif folder rounded shadow-sm"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="m-r-10 h2 mdi mdi-folder"></i>

                    <div class="">{{ $item->start_date }}</div>
                    <div>{{ $item->end_date }}</div>

                </div>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-primary" wire:click="viewterms({{ $item->id }})"
                        href="#">
                        <span wire:loading wire:target="viewterms({{ $item->id }})"
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i
                            class="fa fa-eye" aria-hidden="true"></i>View Terms
                    </a>
                    <a class="dropdown-item text-primary " wire:click="edit({{ $item->id }})" href="#">
                        <i class="m-r-10 mdi mdi-grease-pencil"></i> Edit
                    </a>
                    @if ($item->is_current == 'false')
                        <a class="dropdown-item text-primary " wire:click="make_current({{ $item->id }})"
                            href="#">
                             <span wire:loading wire:target="make_current({{ $item->id }})"
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <i class="fa fa-check" aria-hidden="true"></i> Activate
                        </a>
                    @endif

                </div>
            </div>
        @empty
            <div class="col-12 col-md-12 col-lg-12">
                <div class="text-center">
                    <h1 class="text-center text-muted ">EMPTY</h1>
                </div>
            </div>
        @endforelse
    </div>
</div>
