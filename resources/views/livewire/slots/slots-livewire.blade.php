<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Slots</h3>
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
                <x-modal-lg :status="$create_modal" title="Add date" >
                    
                    <form wire:submit.prevent='store' >
                        <div class="form-group">
                            <label for="">Day</label>
                            <select wire:model.defer='day'  class="form-control" >
                                <option value="">Select Day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            <x-error for="day" />
                        </div>
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="time" class="form-control" wire:model.defer='time' >
                            <x-error for="time" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark">
                                save <span wire:target='store' wire:loading class="spinner-border spinner-border-sm" ></span>
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
                                    <th>Days</th>
                                    <th>Time</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse ($slots as $index=> $item)
                                       <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $item->day }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td></td>
                                       </tr>
                                   @empty
                                       <tr>
                                        <td colspan="4" class="text-center" >EMPTY</td>
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
