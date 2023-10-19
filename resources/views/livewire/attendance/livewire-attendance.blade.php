<div>
    {{-- In work, do what you enjoy. --}}
    @section('bread')
        <div class="page-breadcrumb ">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Library Session</h3>
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
        <div class="col-lg-4">
            <div class="card bg-danger ">
                <div class="card-body">
                    <h4 class="text-center">Absent</h4>
                    <h5>{{ $absent_count }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-success">
                <div class="card-body">
                    <h4 class="text-center">Present</h4>
                    <h5>{{ $present_count }}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-warning ">
                <div class="card-body">
                    <h4 class="text-center">Late</h4>
                    <h5>{{ $late_count }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">




                    <div class="d-flex justify-content-between  align-items-center ">
                        <div class="text-bold h4"> <i class="fa fa-calendar" aria-hidden="true"></i>
                            {{ $date_status === true ? 'Today' : $current_date }}</div>
                        <div class="d-flex">
                            <div class="form-group">
                                <input type="date" wire:model.lazy='current_date' class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" wire:click='create'>
                                    add<span wire:loading wire:target="create" class="spinner-border spinner-border-sm"
                                        role="status" aria-hidden="true"></span>
                                </button>

                                <x-modal-lg :status="$modal" title="Start Attendance">
                                    <div class="table-responsive-sm">
                                        <form wire:submit.prevent="addstudents">
                                            <table class="table table-hover table-inverse ">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse($inputs ?? [] as $index => $item)
                                                        <tr>
                                                            <td scope="row">{{ $index }}</td>
                                                            <td class=" text-capitalize font-bold "><i
                                                                    class="fa fa-user" aria-hidden="true"></i>
                                                                {{ $item['student_name'] }}</td>
                                                            {{-- <td>{{ $item->status }}</td> --}}
                                                            <td>
                                                                <div>
                                                                    <div class="d-flex">

                                                                        <div class="form-input px-2 text-success">
                                                                            <input
                                                                                wire:model.lazy="inputs.{{ $index }}.status"
                                                                                type="radio" value="present">
                                                                            <label for="">Present</label>
                                                                        </div>
                                                                        <div class="form-input px-2 text-warning">
                                                                            <input
                                                                                wire:model.lazy="inputs.{{ $index }}.status"
                                                                                type="radio" value="late">
                                                                            <label for="">Late</label>
                                                                        </div>
                                                                        <div class="form-input px-2 text-danger">
                                                                            <input
                                                                                wire:model.lazy="inputs.{{ $index }}.status"
                                                                                type="radio" value="absent">
                                                                            <label for="">Absent</label>
                                                                        </div>


                                                                    </div>
                                                                    <div class="d-flex">
                                                                        @error('inputs.' . $index . '.status')
                                                                            <span
                                                                                class=" text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-muted text-center">EMPTY</td>
                                                        </tr>
                                                    @endforelse





                                                </tbody>
                                            </table>

                                            <div class="form-group">
                                                <button class="btn w-100 btn-dark" type="submit">
                                                    save
                                                    <span wire:loading wire:target='addstudents'
                                                        class=" spinner-border spinner-border-sm"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </x-modal-lg>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-inverse ">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class=" d-none d-lg-block ">#</th>
                                    <th>Student</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="">
                                    @forelse($attendance as $index => $item)
                                        <tr>
                                            <td class="d-none d-lg-block" scope="row">{{ $index }}</td>
                                            <td class=" text-lg "> <i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $item->student->name }}</td>
                                            <td wire:focusout='$set("editing_id",{{ null }})' >


                                                @if ($editing_id === $item->id)
                                                    <div class="form-group">
                                                        <select name="input.{{ $item->id }}"
                                                            wire:change.prevent='change_attendance({{ $item->id }} ,$event.target.value)'
                                                            class="form-control">
                                                            <option value="">Select status</option>
                                                            <option class="text-success"
                                                                {{ $item->status === 'present' ? 'selected' : '' }}
                                                                value="present">Present</option>
                                                            <option class="text-warning"
                                                                {{ $item->status === 'late' ? 'selected' : '' }}
                                                                value="late">Late</option>
                                                            <option class="text-danger"
                                                                {{ $item->status === 'absent' ? 'selected' : '' }}
                                                                value="absent">Absent</option>

                                                        </select>
                                                    </div>
                                                @else
                                                    <span wire:dblclick.prevent="$set('editing_id', {{ $item->id }})" 
                                                        class=" text-capitalize  badge @if ($item->status == 'present') bg-success  @elseif($item->status == 'absent') bg-danger  @else bg-warning @endif">
                                                        {{ $item->status }}
                                                    </span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="d-sm-flex d-none ">
                                                    <div class="form-input px-2">
                                                        <input type="radio" name="input.{{ $item->id }}"
                                                            {{ $item->status === 'present' ? 'checked' : '' }}
                                                            wire:change.prevent='change_attendance({{ $item->id }} ,$event.target.value)'
                                                            value="present">
                                                        <label for="" class="text-success">Present</label>
                                                    </div>
                                                    <div class="form-input px-2">
                                                        <input type="radio" name="input.{{ $item->id }}"
                                                            {{ $item->status === 'late' ? 'checked' : '' }}
                                                            wire:change.prevent='change_attendance({{ $item->id }} ,$event.target.value)'
                                                            value="late">
                                                        <label for="" class="text-warning">Late</label>
                                                    </div>
                                                    <div class="form-input px-2">
                                                        <input type="radio" name="input.{{ $item->id }}"
                                                            {{ $item->status === 'absent' ? 'checked' : '' }}
                                                            wire:change.prevent='change_attendance({{ $item->id }} ,$event.target.value)'
                                                            value="absent">
                                                        <label for="" class="text-danger">Absent</label>
                                                    </div>



                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-muted text-center">EMPTY</td>
                                        </tr>
                                    @endforelse

                                </form>



                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
