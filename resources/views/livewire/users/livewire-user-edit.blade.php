<div>
    {{-- Be like water. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Edit<span class="text-capitalize"> {{ $create_role }}</span> : {{ $user->name }} </h3>
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
            <div class="d-flex justify-content-end ">
                <div class="form-group">
                    <button class="btn btn-info" wire:click.prevent='password_reset' >
                        Reset Password  <span wire:target='password_reset' wire:loading class="spinner-border spinner-border-sm"></span>
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    
                    @switch($create_role)
                        @case('teacher')
                            <x-users.forms.teacher-edit :inputs="$inputs" :levels="$levels" :subjects="$subjects" :numbers="$numbers" :mobile_number_modal="$mobile_number_modal" :mobile_number_modal_title="$mobile_number_modal_title"  />
                        @break

                        @case('student')
                            <x-users.forms.student-edit :inputs="$inputs" :students="$students" :levels="$levels" :numbers="$numbers" :mobile_number_modal="$mobile_number_modal" :mobile_number_modal_title="$mobile_number_modal_title" />
                        @break

                        @case('guardian')
                            <x-users.forms.guardian-edit :inputs="$inputs"  :students="$students" :numbers="$numbers" :children="$children" />
                        @break

                        @case('librarian')
                            <x-users.forms.librarian :inputs="$inputs" :students="$students" />
                        @break

                        @default
                    @endswitch
                    <x-modal :status="$mobile_number_modal" title="{{ $mobile_number_modal_title }} Mobile">
                        <form wire:submit.prevent="save_mobile" >
                            <div class="form-group">
                                <label for="">Mobile Type</label>
                                <select class="form-control" wire:model.defer='mobile_type' >
                                    <option value="">select type</option>
                                    <option class="bg-white text-success" value="whatsapp"> <i class="fab fa-whatsapp "></i> Whatsapp</option>
                                    <option class=" bg-white text-secondary  " value="cell">
                                        Cell
                                    </option>
                                </select>
                                <x-error for="mobile_type" />
                            </div>
                    
                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="tel" wire:model.defer='mobile' class="form-control">
                                <x-error for="mobile" />
                            </div>
                    
                            <button type="submit" class="btn btn-dark">Save <span wire:target='save_mobile' wire:loading  class="spinner-border spinner-border-sm"></span></button>
                        </form>
                    
                    </x-modal>
                    <x-modal :status="$child_modal" title="Child" >
                        <form  wire:submit.prevent='store_child'>
                            <div class="form-group ">
                                <label for="">Guardian Role</label>
                                <select class="form-control @error('guardian_role') is-invalid @enderror" wire:model.defer="guardian_role">
                                    <option value="">select</option>
                                    <option value="mother">Mother</option>
                                    <option value="father">Father</option>
                                    <option value="brother">Brother</option>
                                    <option value="sister">Sister</option>
                                    <option value="uncle">Uncle</option>
                                    <option value="aunt">Aunt</option>
                                    <option value="cousin">Cousin</option>
                                    <option value="grandmother">Granmother</option>
                                    <option value="grandfather">Granfather</option>
                                </select>
                                @error('guardian_role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="">Student</label>
                                <select wire:model.defer='student' class="form-control"  >
                                    <option value="">Select</option>
                                    @forelse ($students as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                      <option value="">Empty</option>  
                                    @endforelse
                                </select>
                                <x-error for="student" />
                            </div>

                            <div class="form">
                                <button class="btn  btn-dark ">save <span wire:loading wire:target='store_child'  class="border-spinner border-spinner-sm" ></span> </button>
                            </div>
                            
                        </form>
                    
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</div>
