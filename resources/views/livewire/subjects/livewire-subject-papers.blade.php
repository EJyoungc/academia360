<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="page-breadcrumb pb-3">
        <div class="row">
            <div class="col-5 align-self-center">
                <h3 class="page-title">{{ $subject->name }}</h3>
                <h4>Papers</h4>
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
    <div class="row">
        <div class="col-12 col-lg 12">
            <div class="d-flex justify-content-end">
                <div class="form-group col-6 col-lg-3 ">
                    <input type="text" class="form-control" placeholder="search">
                </div>
                <div class="form-group">
                    <button wire:click.prevent='create' class="btn btn-primary">add</button>
                    <x-modal title="{{ $title }} Paper" :status="$modal" > 
                        <form wire:submit.prevent ='submit'>
                            <div class="form-group">
                                <label for="">Paper</label>
                                <input type="text" class="form-control" wire:model.defer='name'>
                                <x-error for="name"/>
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <select class="form-control" wire:model.lazy='level'>
                                    <option value="">select level</option>
                                    @forelse ($levels as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="level"/>
                            </div>
                            <div class="form-group">
                                <label for="">Class</label>
                                <select type="text" class="form-control" wire:model.defer='class'>
                                    <option value="">Select Class</option>
                                    @forelse ($classtypes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <small class="text-muted d-block" >Please select level </small>
                                <x-error for="class"/>
                            </div>
                            <div class="form-group">
                                <label for="">Mark</label>
                                <input type="number" class="form-control" wire:model.defer='mark'>
                                <x-error for="mark"/>
                            </div>
                            <button type="submit" class="btn-dark btn">save
                                <span wire:target='submit'  wire:loading  class=" spinner-border spinner-border-sm " >
                                    
                                </span>

                            </button>
                        </form>
                    </x-modal>

                </div>
                
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Paper</th>
                                    <th>Mark</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($papers as $index=> $item)
                                <tr>
                                    <td scope="row">{{ $index }}</td>
                                    <td>{{ $item->paper }}</td>
                                    <td>{{ $item->mark }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                option
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="triggerId">
                                                <a class="dropdown-item"
                                                    wire:click.prevent="edit({{ $item->id }})"
                                                    href="#">Edit</a>
                                                

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
