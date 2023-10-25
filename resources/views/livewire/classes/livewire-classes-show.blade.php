<div>
    {{-- Stop trying to control. --}}
    {{-- @section('bread')
    <div class="page-breadcrumb pb-5">
        <div class="row">
            <div class="col-5 align-self-center">
                <h3 class="page-title">Class :{{ $classroom->name }}</h3>
                <h3 class="page-title">Teacher :{{ $classroom->teacher->name ?? 'Unassigned' }}</h3>
                <div class="d-flex align-items-center">

                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <div class="d-flex flex-row">
                        <div>
                            
                        </div>
                        <nav aria-label="breadcrumb">
                           
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection --}}
    
    <div class="row">

        <div class="col-lg-4 col-12 ">
            <a href="{{ route('class.attendance', $classroom_id) }}">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h4 class="text-white">Attendance</h4>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-lg-4 col-12 ">
            <div class="card bg-success">
                <div class="card-body">
                    <h4>Class Average</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 ">
            <div class="card bg-danger">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12 py-4">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <h3>Class :{{ $classroom->name }}</h3>
                    <h3>Teacher :{{ $classroom->teacher->name ?? 'Unassigned' }}</h3>
                </div>
                <div class="dropdown open">
                    <button class="btn btn-primary " type="button" id="triggerId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        options
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <button class="dropdown-item" wire:click.prevent='open_atm_modal'>Assign Base Teacher</button>
    
                        <button class="dropdown-item disabled" href="#">Change class subjects</button>
                        <button class="dropdown-item " wire:click.prevent="bottest" href="#">chat bot test</button>
                    </div>
                    <x-modal :status="$assign_teacher_modal" title="Assign Teacher">
                        <form wire:submit.prevent='assign_teacher'>
                            <div class="form-group">
                                <label for="">Teacher</label>
                                <select type="text" wire:model.defer='teacher' class="form-control">
                                    <option value="">Select</option>
                                    @forelse ($teachers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="teacher" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn w-100 btn-dark">save
                                    <span wire:taget='assign_teacher' wire:loading class=" spinner-border spinner-border-sm" ></span>
                                </button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="h3">Terms</div>
                        <div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 px-4">
                            
                            <div class="row">
                                <a href="">
                                    <div class="col-lg-12 border-bottom-1">
                                        <div class="text-center h4">Term 1</div>
                                    </div>
                                    <div class="col-lg-12 border-1 border-top">
                                        <div class="text-center h4 ">80%</div>
                                    </div>
                                </a> 
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 px-4">
                            <div class="row">
                                <div class="col-lg-12 border-bottom-1">
                                    <div class="text-center h4">Term 2</div>
                                </div>
                                <div class="col-lg-12 border-1 border-top">
                                    <div class="text-center h4 ">80%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 px-4  ">
                            <div class="row">
                                <div class="col-lg-12 border-bottom-1">
                                    <div class="text-center h4">Term 3</div>
                                </div>
                                <div class="col-lg-12 border-1 border-top">
                                    <div class="text-center h4 ">80%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="h3">Students</div>
                    </div>
                    <div class="row">
                        @forelse($students as $item)
                            <div class="col-6 col-lg-3">
                                <div class="d-flex flex-column justify-content-center p-1 ">
                                    <i class="fa fa-user font-24 text-center" aria-hidden="true"></i>
                                    <div class="h5 text-center">{{ $item->student->name }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 col-lg-12">
                                <ul class="list-group">
                                    <li
                                        class="list-group-item text-muted d-flex justify-content-center align-items-center">
                                        EMPTY

                                    </li>

                                </ul>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
