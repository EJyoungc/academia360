<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Subject</h3>
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
        <div class="col-lg-12">
            <div class="d-flex justify-content-end">
                <div class="form-group">
                    <input type="text" wire:model='search' class="form-control"  placeholder="Search ..">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" wire:click.prevent="create">add

                        <span wire:loading wire:target="create" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <x-modal :title="$title.' Subject'" :status="$modal">
                       <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" wire:model="name" class="form-control" >
                            @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-input ">
                            <input type="checkbox" wire:model='addpaper' class="p-3"> <label for="">Add Papers</label>
                        </div>
                        <button type="submit" class="btn w-100 btn-primary">
                            save
                            <span wire:target='store' wire:loading class="spinner-border spinner-border-sm" >

                            </span>
                        </button>
                       </form>

                        

                    </x-modal>
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Papers</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subjects as $index => $item)
                                    <tr>
                                        <td scope="row">{{ $index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->papers->count() }}</td>
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
                                                        href="{{ route('subjects.papers', $item->id) }}">View
                                                        Subjects</a>
                                                    <a class="dropdown-item"
                                                        wire:click.prevent="create({{ $item->id }})"
                                                        href="#">Edit</a>
                                                    

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">EMPTY</td>
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
