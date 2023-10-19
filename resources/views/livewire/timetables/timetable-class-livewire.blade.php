<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Time Table : {{ $classroom->crt->name }} {{ $classroom->name }}  </h3>
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

                        <div class="form-group ">
                            <label for="">Subject Teacher</label>
                            @foreach ($inputs as $key => $item)
                                <div class="input-group pt-1">
                                    <select type="text"
                                        wire:model.defer="inputs.{{ $key }}.teacher"
                                        wire:change='inputcheck({{ 'inputs'.$key.'teacher' }})'
                                        class="col-lg-4 bg-secondary form-control text-white @error('inputs.' . $key . '.teacher') is-invalid @enderror">
                                        <option value="">Select subjects</option>
                                        @forelse ($subjects as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @empty
                                            <option value="">Empty</option>
                                        @endforelse
                                    </select>
                                    <select 
                                        wire:model.defer="inputs.{{ $key }}.subject"
                                        
                                        class="form-control @error('inputs.' . $key . '.subject') is-invalid @enderror">
                                        <option value="">Select teachers </option>
                                        @forelse ($teachers as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @empty
                                            <option value="">Empty</option>
                                        @endforelse
                                    </select>
                                    <div class="d-flex justify-between">

                                        <div class="px-1">
                                            @if ($key > 0)
                                                <button
                                                    wire:click.prevent="removeno({{ $key }})"
                                                    class="btn btn-sm btn-success"><i
                                                        class="fa fa-minus"
                                                        aria-hidden="true"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    @error('inputs.' . $key . '.teacher')
                                        <span class="col-lg-4 text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('inputs.' . $key . '.subject')
                                        <span class="col-lg-8 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="text-center">
                                <button wire:click.prevent="addno" class="btn btn-link"><i
                                        class="fa fa-plus" aria-hidden="true"></i> add phone
                                    number</button>
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="">Slot</label>
                            <select class="form-control" >
                                <option value="">Select slot</option>
                                @forelse ($slots as $item)
                                   <option value="{{ $item->id }}">{{ $item->day }} / {{ $item->start }} </option> 
                                @empty
                                    <option value="">Empty</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">save</button>
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
                                    <th>Days</th>
                                    <th>Time</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Monday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Tuesday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Wednesday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Thurday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Friday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Saturday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Sunday</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
