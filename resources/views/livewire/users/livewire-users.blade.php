<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Users</h3>
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



    @if ($folder == 'all')
        <div class="row">
            <!-- Column -->
            <div class="col-md-12 col-lg-12">
                <div class="d-flex justify-content-end">
                    <div class="form-group pr-1">
                        <input wire:model="search" type="search" placeholder="search" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="btn-group">
                            {{-- modal button --}}
                            {{-- <button class="btn btn-primary form-control" wire:click='create'>
                                <span wire:loading wire:target="create" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                add
                            </button> --}}

                            <button class="btn btn-outline-primary " type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                add
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('user.create', 'teacher') }}">Teacher</a>
                                <a class="dropdown-item" href="{{ route('user.create', 'student') }}">Student</a>
                                <a class="dropdown-item" href="{{ route('user.create', 'guardian') }}">Guardian</a>
                                <a class="dropdown-item" href="{{ route('user.create', 'librarian') }}">Librarian</a>


                            </div>


                        </div>
                    </div>

                </div>
                <div class="card ">
                    <div class="card-body p-0">
                        <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                            <table class="table table-hover  ">
                                <thead class="thead-light">
                                    <tr class="">
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($u as $item)
                                        @if ($item->role != 'system')
                                            <tr>
                                                <td scope="row"><img
                                                        src="@if ($item->profile_photo_path == '') {{ asset('assets/uploads/images/face-0.jpg') }}  @else{{ asset('assets/uploads/' . $item->profile_photo_path) }} @endif"
                                                        class="rounded" height="50" width="50" alt="">
                                                </td>

                                                <td>{{ $item->name }}</td>
                                                <td> {{ $item->email }}</td>
                                                <td>
                                                    {{ $item->role }}
                                                </td>
                                                <td><span
                                                        class=" h6 text-white @if ($item->status == 'active') badge bg-success  @else badge bg-danger @endif">
                                                        {{ $item->status }} </span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                        class="btn btn-info btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {{-- <a class="dropdown-item"
                                                            wire:click="edit({{ $item->id }})"
                                                            href="#">Edit</a> --}}

                                                        @if ($item->role != 'admin')
                                                        <a class="dropdown-item" href="{{ route('user.edit', ['id' => $item->id, 'role' => $item->role]) }}">Edit</a>
                                                        
            
                                                        @endif

                                                        <a href="" class="dropdown-menu">Edit</a>
                                                        <a class="dropdown-item"
                                                            wire:click="activate({{ $item->id }})"
                                                            href="#">Activate</a>
                                                        <a class="dropdown-item"
                                                            wire:click="deactivate({{ $item->id }})"
                                                            href="#">Deactivate</a>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted h1">EMPTY</td>

                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                {{ $u->links() }}

            </div>
            <!-- Column -->

        </div>
    @endif
    @if ($folder == 'edit')
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end">

                    <div class="form-group">
                        <div class="btn-group">
                            {{-- modal button --}}
                            <button class="btn btn-sm btn-primary form-control" wire:click='cancel'>
                                <span wire:loading wire:target="cancel" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                Cancel
                            </button>


                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="h3">Edit</div>
                        <form wire:submit.prevent='update'>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="text-center">
                                        <div class="col-12">
                                            <img src="@if ($user->profile_photo_path == null) {{ asset('assets/uploads/images/face-0.jpg') }}  @else{{ asset('assets/uploads/' . $user->profile_photo_path) }} @endif"
                                                alt="" class="rounded" height="50" width="50"
                                                srcset="">
                                            <div class="d-flex">
                                                <div x-data="{ isUploading: false, progress: 0 }"
                                                    x-on:livewire-upload-start="isUploading = true"
                                                    x-on:livewire-upload-finish="isUploading = false"
                                                    x-on:livewire-upload-error="isUploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                                    class="pr-1">
                                                    <input wire:model.defer="photo" type="file"
                                                        class="form-control @error('photo') is-invalid @enderror">
                                                    <div x-show="isUploading">
                                                        <progress max="100"
                                                            x-bind:value="progress"></progress>
                                                    </div>
                                                    @error('photo')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="pl-1">
                                                    @if (!$user->profile_photo_path == '')
                                                        <button wire:click='removeimage'
                                                            class="btn btn-sm btn-danger">remove</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Full Name</label>
                                    <input type="text" wire:model.defer="Name"
                                        class="form-control @error('Name') is-invalid @enderror">
                                    @error('Name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Role</label>

                                    <select type="text" wire:model.defer="role"
                                        class="form-control @error('role') is-invalid @enderror">
                                        <option value="">Select role</option>
                                        @if (Auth::user()->role == 'system')
                                            <option value="system">system</option>
                                        @endif
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                        <option value="guardian">Guardian</option>
                                        <option value="librarian">Librairan</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Nationality</label>
                                    <input type="text" wire:model.defer="nationality"
                                        class="form-control @error('nationality') is-invalid @enderror">
                                    @error('nationality')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Gender</label>
                                    <select type="text" wire:model.defer="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Phone Number</label>
                                    Existing number
                                    @foreach ($usernumbers as $key => $item)
                                        <div class="d-flex justify-content-between py-1">
                                            <div class=""> {{ $item->phone_type }}</div>
                                            <div class="">{{ $item->number }}</div>
                                            <div class="d-flex">

                                                <div class="px-1">
                                                    <button wire:click.prevent="removeNumber({{ $item->id }})"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="input-group pt-1">
                                        <select type="text" wire:model.defer="phone_type"
                                            class="col-lg-4 bg-secondary text-white @error('phone_type') is-invalid @enderror">
                                            <option value="">select type</option>
                                            <option class="bg-white text-success" value="whatsapp"> <i
                                                    class="fab fa-whatsapp  "></i> Whatsapp
                                            </option>
                                            <option class=" bg-white text-secondary  " value="cell">Cell
                                            </option>
                                            <option class=" bg-white text-secondary " value="telephone">
                                                Telephone</option>
                                        </select>
                                        <input type="text" wire:model.defer="number"
                                            class="form-control @error('number') is-invalid @enderror">

                                        <div class="d-flex justify-between">

                                            <div class="px-1">
                                                <button wire:click="addNumber" class="btn btn-sm btn-success"><i
                                                        class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @error('phone_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Address</label>
                                    <textarea type="text" wire:model.defer="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Occupation</label>
                                    <input type="text" wire:model.defer="occupation"
                                        class="form-control @error('occupation') is-invalid @enderror">
                                    @error('occupation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="">Password</label>
                                    <input type="text" wire:model.defer="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($folder == 'create')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="h3">Add</div>

                            <div class="form-group">
                                <div class="btn-group">
                                    {{-- modal button --}}
                                    <button class="btn btn-sm btn-primary form-control" wire:click='cancel'>
                                        <span wire:loading wire:target="cancel"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Back
                                    </button>


                                </div>
                            </div>

                        </div>

                        <ul class="nav nav-pills m-t-30 pb-2 m-b-30">

                            <li class=" nav-item"> <a wire:click.prevent="switchfolder('student')" href="#"
                                    class="nav-link @if ($subfolder == 'student') active @endif ">Student</a>
                            </li>
                            <li class="nav-item"> <a wire:click.prevent="switchfolder('guardian')" href="#"
                                    class="nav-link @if ($subfolder == 'guardian') active @endif ">Guardian</a>
                            </li>
                            <li class="nav-item"> <a wire:click.prevent="switchfolder('teacher')" href="#"
                                    class="nav-link @if ($subfolder == 'teacher') active @endif  ">Teacher</a>
                            </li>
                            <li class="nav-item"> <a wire:click.prevent="switchfolder('librarian')" href="#"
                                    class="nav-link @if ($subfolder == 'librarian') active @endif ">Librarian</a>
                            </li>

                        </ul>
                        <div class="tab-content br-n pn">
                            {{-- student --}}
                            <div class="@if ($subfolder == 'student') d-block @else d-none @endif">
                                <form wire:submit.prevent='store("student")'>
                                    <div class="row">
                                        <div class=" col-lg-12 ">

                                            <div class="form-group col-sm-12 ">
                                                <label for="">Full Name</label>
                                                <input type="text" wire:model.defer="Name"
                                                    class="form-control @error('Name') is-invalid @enderror">
                                                @error('Name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="">Email</label>
                                                <input type="email" wire:model.defer="email"
                                                    class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="">Gender</label>
                                                <select type="text" wire:model.defer="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="">Date of birth</label>
                                                <input type="date" wire:model.defer="date_of_birth"
                                                    class="form-control @error('date_of_birth') is-invalid @enderror">
                                                @error('date_of_birth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <label for="">Nationality</label>
                                                <input type="text" wire:model.defer="nationality"
                                                    class="form-control @error('nationality') is-invalid @enderror">
                                                @error('nationality')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="form-group ">
                                                <label for="">Phone Number</label>
                                                @foreach ($inputs as $key => $item)
                                                    <div class="input-group pt-1">
                                                        <select type="text"
                                                            wire:model.defer="inputs.{{ $key }}.phone_type"
                                                            class="col-lg-4 bg-secondary form-control text-white @error('inputs.' . $key . '.phone_type') is-invalid @enderror">
                                                            <option value="">select type</option>
                                                            <option class="bg-white text-success" value="whatsapp"> <i
                                                                    class="fab fa-whatsapp  "></i> Whatsapp
                                                            </option>
                                                            <option class=" bg-white text-secondary  " value="cell">
                                                                Cell
                                                            </option>
                                                            <option class=" bg-white text-secondary "
                                                                value="telephone">
                                                                Telephone</option>
                                                        </select>
                                                        <input type="text"
                                                            wire:model.defer="inputs.{{ $key }}.phone"
                                                            placeholder="265..."
                                                            class="form-control @error('inputs.' . $key . '.phone') is-invalid @enderror"">

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
                                                        @error('inputs.' . $key . '.phone_type')
                                                            <span class="col-lg-4 text-danger">{{ $message }}</span>
                                                        @enderror
                                                        @error('inputs.' . $key . '.phone')
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Medical Issues</label>
                                        <textarea wire:model.defer="medical_issues" class=" form-control @error('medical_issues') is-invalid @enderror "></textarea>
                                        @error('medical_issues')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="">Password</label>
                                        <input type="text" readonly wire:model.defer="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Save</button>
                                    </div>
                                </form>
                            </div>
                            {{-- student --}}
                            {{-- guardian --}}
                            <div class="@if ($subfolder == 'guardian') d-block @else d-none @endif">
                                <form wire:submit.prevent='store("guardian")'>
                                    <div class="row">
                                        <div class="form-group col-sm-12 ">
                                            <label for="">Full Name</label>
                                            <input type="text" wire:model.defer="Name"
                                                class="form-control @error('Name') is-invalid @enderror">
                                            @error('Name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 ">
                                            <label for="">Email</label>
                                            <input type="email" wire:model.defer="email"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 ">
                                            <label for="">Guardian Role</label>
                                            <select class="form-control @error('guardian_role') is-invalid @enderror"
                                                wire:model.defer="guardian_role">
                                                <option value="">select</option>
                                                <option value="mother">Mother</option>
                                                <option value="father">Father</option>
                                                <option value="brother">Brother</option>
                                                <option value="sister">Sister</option>
                                                <option value="uncle">Uncle</option>
                                                <option value="aunt">Aunt</option>
                                                <option value="cousin">Cousin</option>
                                                <option value="granmother">Granmother</option>
                                                <option value="granfather">Granfather</option>
                                            </select>
                                            @error('guardian_role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="">Guardian child</label>
                                            <select multiple class="form-control" wire:model.defer="guardian_child">
                                                <option value="">select</option>
                                                @foreach ($students as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 ">
                                            <label for="">Nationality</label>
                                            <input type="text" wire:model.defer="nationality"
                                                class="form-control @error('nationality') is-invalid @enderror">
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-group col-sm-12 ">
                                            <label for="">Phone Number</label>
                                            @foreach ($inputs as $key => $item)
                                                <div class="input-group pt-1">
                                                    <select type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone_type"
                                                        class="col-lg-4 bg-secondary form-control text-white @error('inputs.' . $key . '.phone_type') is-invalid @enderror">
                                                        <option value="">select type</option>
                                                        <option class="bg-white text-success" value="whatsapp"> <i
                                                                class="fab fa-whatsapp  "></i> Whatsapp
                                                        </option>
                                                        <option class=" bg-white text-secondary  " value="cell">
                                                            Cell
                                                        </option>
                                                        <option class=" bg-white text-secondary " value="telephone">
                                                            Telephone</option>
                                                    </select>
                                                    <input type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone"
                                                        placeholder="265..."
                                                        class="form-control @error('inputs.' . $key . '.phone') is-invalid @enderror"">

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
                                                    @error('inputs.' . $key . '.phone_type')
                                                        <span class="col-lg-4 text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @error('inputs.' . $key . '.phone')
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

                                        <div class="form-group col-sm-12 ">
                                            <label for="">Address</label>
                                            <textarea type="text" wire:model.defer="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-12 ">
                                            <label for="">Occupation</label>
                                            <input type="text" wire:model.defer="occupation"
                                                class="form-control @error('occupation') is-invalid @enderror">
                                            @error('occupation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="">Password</label>
                                        <input type="text" readonly wire:model.defer="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Store</button>
                                    </div>
                                </form>
                            </div>
                            {{-- guardian --}}
                            {{-- teacher --}}
                            <div class="@if ($subfolder == 'teacher') d-block @else d-none @endif">
                                <form wire:submit.prevent='store("teacher")'>
                                    <div class="">
                                        <div class="form-group ">
                                            <label for="">Full Name</label>
                                            <input type="text" wire:model.defer="Name"
                                                class="form-control @error('Name') is-invalid @enderror">
                                            @error('Name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label for="">Gender</label>
                                            <select type="text" wire:model.defer="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label for="">Email</label>
                                            <input type="email" wire:model.defer="email"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group  ">
                                            <label for="">Nationality</label>
                                            <input type="text" wire:model.defer="nationality"
                                                class="form-control @error('nationality') is-invalid @enderror">
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group  ">
                                            <label for="">Phone Number</label>
                                            @foreach ($inputs as $key => $item)
                                                <div class="input-group pt-1">
                                                    <select type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone_type"
                                                        class="col-lg-4 bg-secondary form-control text-white @error('inputs.' . $key . '.phone_type') is-invalid @enderror">
                                                        <option value="">select type</option>
                                                        <option class="bg-white text-success" value="whatsapp"> <i
                                                                class="fab fa-whatsapp  "></i> Whatsapp
                                                        </option>
                                                        <option class=" bg-white text-secondary  " value="cell">
                                                            Cell
                                                        </option>
                                                        <option class=" bg-white text-secondary " value="telephone">
                                                            Telephone</option>
                                                    </select>
                                                    <input type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone"
                                                        placeholder="265..."
                                                        class="form-control @error('inputs.' . $key . '.phone') is-invalid @enderror"">

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
                                                    @error('inputs.' . $key . '.phone_type')
                                                        <span class="col-lg-4 text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @error('inputs.' . $key . '.phone')
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
                                        <div class="form-group  ">
                                            <label for="">Password</label>
                                            <input type="text" readonly wire:model.defer="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark">Store</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- teacher --}}
                            {{-- library --}}
                            <div class="@if ($subfolder == 'librarian') d-block @else d-none @endif">
                                <form wire:submit.prevent='store("librarian")'>
                                    <div class="">
                                        <div class="form-group ">
                                            <label for="">Full Name</label>
                                            <input type="text" wire:model.defer="Name"
                                                class="form-control @error('Name') is-invalid @enderror">
                                            @error('Name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label for="">Gender</label>
                                            <select type="text" wire:model.defer="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label for="">Email</label>
                                            <input type="email" wire:model.defer="email"
                                                class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group  ">
                                            <label for="">Nationality</label>
                                            <input type="text" wire:model.defer="nationality"
                                                class="form-control @error('nationality') is-invalid @enderror">
                                            @error('nationality')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group  ">
                                            <label for="">Phone Number</label>
                                            @foreach ($inputs as $key => $item)
                                                <div class="input-group pt-1">
                                                    <select type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone_type"
                                                        class="col-lg-4 bg-secondary form-control text-white @error('inputs.' . $key . '.phone_type') is-invalid @enderror">
                                                        <option value="">select type</option>
                                                        <option class="bg-white text-success" value="whatsapp"> <i
                                                                class="fab fa-whatsapp  "></i> Whatsapp
                                                        </option>
                                                        <option class=" bg-white text-secondary  " value="cell">
                                                            Cell
                                                        </option>
                                                        <option class=" bg-white text-secondary " value="telephone">
                                                            Telephone</option>
                                                    </select>
                                                    <input type="text"
                                                        wire:model.defer="inputs.{{ $key }}.phone"
                                                        placeholder="265..."
                                                        class="form-control @error('inputs.' . $key . '.phone') is-invalid @enderror"">

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
                                                    @error('inputs.' . $key . '.phone_type')
                                                        <span class="col-lg-4 text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @error('inputs.' . $key . '.phone')
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
                                        <div class="form-group  ">
                                            <label for="">Password</label>
                                            <input type="text" readonly wire:model.defer="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark">Store</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- library --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
