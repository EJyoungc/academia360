<div>
    {{-- The whole world belongs to you. --}}
    @section('bread')
        <div class="page-breadcrumb pb-5">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Payments</h3>
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
                                    <div class="modal-body" style="overflow-y:scroll;height:500px">
                                        <div class="text-center h3 ">
                                            Add Payments
                                        </div>
                                        <form wire:submit.prevent="store">


                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror "
                                                    wire:model.defer="name">
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Amount</label>
                                                <input type="text"
                                                    class="form-control @error('amount') is-invalid @enderror "
                                                    wire:model.defer="amount">
                                                @error('amount')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">class</label>
                                                <select class="form-control @error('class') is-invalid @enderror "
                                                    wire:model.defer="class">
                                                    <option value="">Select classes</option>
                                                    @forelse ($classes as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                    @empty
                                                        <option value="">Empty</option>
                                                    @endforelse
                                                </select>
                                                @error('class')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Academic Year</label>
                                                <select class="form-control @error('year') is-invalid @enderror "
                                                    wire:model="year">
                                                    <option value="">Select Academic</option>
                                                    @forelse ($years as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->start_date }}/{{ $item->end_date }}
                                                        </option>
                                                    @empty
                                                        <option value="">Empty</option>
                                                    @endforelse
                                                </select>
                                                @error('year')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Term</label>
                                                <span wire:loading wire:target="updatedYear">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                </span>
                                                <select class="form-control @error('term') is-invalid @enderror "
                                                    wire:model.defer="term">
                                                    <option selected value="all">all terms</option>
                                                    @forelse ($terms as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->yearonly($item->academic_year->start_date) }}/{{ $item->yearonly($item->academic_year->end_date) }}
                                                            - {{ $item->name }}</option>
                                                    @empty
                                                        <option value="">Empty</option>
                                                    @endforelse
                                                </select>
                                                @error('term')
                                                    <span class="text-danger">`
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
                                    <div class="modal-body" style="overflow-y:scroll;height:500px">
                                        <div class="text-center h3 ">
                                            Edit Payment
                                        </div>
                                        <form wire:submit.prevent="update">


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
                        {{-- editallmodal --}}
                        <div class="modal long-modal "@if ($editallmodal) style="display:block" @endif
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
                                    <div class="modal-body" style="overflow-y:scroll;height:500px">
                                        <div class="text-center h3 ">
                                            Edit Payment
                                        </div>
                                        <form wire:submit.prevent="update">


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
                        {{-- editallmodal --}}
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body p-0 ">
                    <table class="table  table-inverse table-hover table-responsive-sm ">
                        <thead class="thead-inverse">
                            <tr>

                                <th>Name</th>
                                <th>Amount</th>
                                <th>Class</th>
                                <th>Term</th>
                                <th>academic Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->classroomtype->name }} </td>
                                    <td>{{ $item->term->name }}</td>
                                    <td>{{ $item->yearonly($item->ay->start_date) }} /
                                        {{ $item->yearonly($item->ay->end_date) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" wire:click='editall({{$item->academic_year_id}})' href="#">
                                                    <span wire:loading wire:target="editall({{$item->academic_year_id}})"
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span> Edit all</a>
                                                <a class="dropdown-item" wire:click='edit({{$item->id}})' href="#">
                                                    <span wire:loading wire:target="edit({{ $item->id }})"
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">Something else here</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
