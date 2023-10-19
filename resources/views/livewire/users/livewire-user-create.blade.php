<div>
    {{-- In work, do what you enjoy. --}}
    @section('bread')
        <div class="page-breadcrumb pb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Create User : <span class="text-capitalize"> {{ $create_role }}</span> </h3>
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
            <div class="card">
                <div class="card-body">
                    @switch($create_role)
                        @case('teacher')
                            <x-users.forms.teacher :inputs="$inputs" :subjects="$subjects" :levels="$levels" />
                        @break

                        @case('student')
                            <x-users.forms.student :inputs="$inputs" :students="$students" />
                        @break

                        @case('guardian')
                            <x-users.forms.guardian :inputs="$inputs" :students="$students"  />
                        @break

                        @case('librarian')
                            <x-users.forms.librarian :inputs="$inputs" :students="$students" />
                        @break

                        @default
                    @endswitch

                </div>
            </div>
        </div>
    </div>



</div>
