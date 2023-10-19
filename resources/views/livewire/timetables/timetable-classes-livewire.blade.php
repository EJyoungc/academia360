<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Exam Time Table</h3>
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
        <div class="col-lg-12 col-12">
            <div class="d-flex justify-content-end ">
                <div class="form-group">
                    <button class="btn btn-primary" wire:click='create' >Add
                        <span wire:target='create' wire:loading class="spinner-border spinner-border-sm" ></span>

                    </button>
                </div>
                <x-modal-lg :status="$create_modal" title="Add Class Time Table" >
                    
                    <form wire:submit.prevent='store' >
                        <div class="form-group">
                            <label for="">Class</label>
                            <select wire:model='class' class="form-control">
                                <option value="">Select Class</option>
                                @forelse ($classrooms as $item)
                                    <option value="{{ $item->id }}">{{ $item->crt->name }} {{ $item->name }}</option>
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                            <x-error for="class" />
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-dark form-control">
                            save
                            <span wire:target='store' wire:loading  class="spinner-border spinner-border-sm" ></span>
                          </button>
                        </div>
                        
             
                    </form>

                </x-modal-lg>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Classes</th>
                                    
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($timetables as $index => $item)
                                    <tr>
                                        <td scope="row">{{ $index }}</td>
                                        <td> {{ $item->classtype_name }} ({{ $item->classroom_name }})</td>
                                        <td>
                                            <button class="btn btn-outline-primary " type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('timetable.class.show',$item->classroom_id) }}">View</a>
                                            <a class="dropdown-item"
                                                wire:click.prevent="open_modal({{ $item->id }})"
                                                href="#">Edit</a>
                                           

                                        </div>
                                        </td>
                                       
                                    </tr>
                                    @empty
                                    <tr>
                                        <td scope="row" colspan="3" class="text-center text-muted" >EMPTY</td>
                                        
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
