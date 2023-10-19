<div>
    {{-- In work, do what you enjoy. --}}
    @section('bread')
        <div class="page-breadcrumb pb-5">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Students</h3>
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
                        <div class="modal long-modal "@if ($addmodal) style="display:block;" @endif
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
                                        <div class="text-center h3">
                                            Add Student
                                        </div>
                                        <form wire:submit.prevent="store">
                                            <div class="row justify-content-center ">
                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" class="rounded-circle"
                                                        style="height:100px;width:100px;" class="" alt="">
                                                @else
                                                    <img src="{{ asset('assets/uploads/images/face-0.jpg') }}"
                                                        class="rounded-circle" style="height:100px;width:100px;"
                                                        class="" alt="">
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label for="">image</label>
                                                <input type="file"
                                                    wire:model="image"class="form-control  @error('image') is-invalid @enderror">
                                                <span wire:loading wire:target="image">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    please wait
                                                </span>
                                                @error('image')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="name"
                                                    wire:model.defer="name"class="form-control  @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Date Of Birth</label>
                                                <input type="date" wire:model.defer="date_of_birth"
                                                    class="form-control @error('date_of_birth') is-invalid @enderror">
                                                @error('date_of_birth')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <select wire:model.defer="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="">Parent</label>
                                                <select wire:model.defer="parent"
                                                    class="form-control @error('date_of_birth') is-invalid @enderror">
                                                    <option value="">Select Parent</option>
                                                    @forelse ($parents as $item)
                                                        <option
                                                            style="background-image: url('@if ($item->profile_photo_path == '') {{ asset('assets/uploads/images/face-0.jpg') }}  @else{{ asset('assets/uploads/' . $item->profile_photo_path) }} @endif')"
                                                            value="{{ $item->id }}">
                                                            {{ $item->name }} {{ $item->email }}
                                                            {{ $item->profile_photo_path }}
                                                            <img src="@if ($item->profile_photo_path == '') {{ asset('assets/uploads/images/face-0.jpg') }}  @else{{ asset('assets/uploads/' . $item->profile_photo_path) }} @endif"
                                                                class="rounded" height="70" width="70"
                                                                alt="">
                                                        </option>
                                                    @empty
                                                        <option value="">Empty</option>
                                                    @endforelse
                                                </select>
                                                @error('parent')
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
        </div>
    </div>



    <div class="row">
        @forelse ($students as $item)
            <div class=" col-sm-6  col-md-4 col-lg-3  ">
                <div class="card border-1 @if ($item->academic_log_id == '') border-danger @endif">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="@if($item->profile_photo_path == null) {{ asset('assets/uploads/images/face-0.jpg') }} @else {{ asset('assets/uploads/' . $item->cover) }} @endif" width="70" height="70"
                                class="rounded-circle" alt="">

                            <div class="h5">{{ $item->name }}</div>

                            <div class="btn-group p-1">
                                <a href="{{route('students.show',$item->id)}}"
                                    class="btn btn-sm btn-outline-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <button type="button" wire:click="edit({{ $item->id }})"
                                    class="btn btn-sm btn-outline-primary">
                                    <span wire:loading wire:target="edit({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm"
                                            role="status"aria-hidden="true">
                                        </span>
                                    </span>
                                    <i class="m-r-10 mdi mdi-grease-pencil"></i>
                                </button>

                            </div>
                        </div>
                    </div>
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
