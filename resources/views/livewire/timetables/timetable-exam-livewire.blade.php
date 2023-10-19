<div>
    {{-- The Master doesn't talk, he acts. --}}
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
        <div class="col-12 col-lg-12">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    {{-- <div class="form-group">
                        <select class="form-control" wire:model.lazy="filter_term"  >
                        <option value="">Select Term</option>
                            <option value="">Select Term</option>
                            @forelse ($filter_terms as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div> --}}
                    <div class="form-group  ">
                        <input type="" class="form-control" wire:model='search' placeholder="search..">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" wire:click.prevent='open_modal'>add <span
                                class="spinner-border spinner-border-sm" wire:target='open_modal'
                                wire:loading></span></button>
                    </div>

                    <x-modal-lg :status="$preview_modal">
                        <div class="d-flex justify-content-end">
                            {{-- <button id='btn_reload' data-url="{{ route('pdf.term_timetable', [1, 2]) }}">Reload</button> --}}
                            
                        </div>
                        @if ($preview_modal)
                        <iframe id="pdf_frame" style="width: 100%; height:500px"
                        src="{{ route('pdf.term_timetable', $link) }}" frameborder="0"></iframe>
                        @endif
                        
            
                    </x-modal-lg>


                    <x-modal-lg :status="$create_modal" title="{{ $title }} Timetable">

                        <form wire:submit.prevent='store'>
                            <div class="form-group">
                                <label for="">Academic Year</label>
                                <select wire:model.lazy='academic_year' class="form-control">
                                    <option value="">select term</option>
                                    @forelse ($academic_years  as $item)
                                        <option class="{{ $item->is_current === 'true' ? 'text-primary' : '' }}"
                                            value="{{ $item->id }}">{{ $item->start_date }}/ {{ $item->end_date }}
                                            {{ $item->is_current === 'true' ? 'Current Session' : '' }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="academic_year" />
                            </div>
                            <div class="form-group">
                                <label for="">Term</label>
                                <select wire:model.lazy='term' class="form-control">
                                    <option value="">select term</option>
                                    @forelse ($terms as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="term" />
                            </div>

                            <div class="form-group">
                                <label for="">Level</label>
                                <select wire:model.lazy='level' class="form-control">
                                    <option value="">select level</option>
                                    @forelse ($levels as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} </option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="level" />
                            </div>


                            <div class="form-group">
                                <label for="">Subject</label>
                                <select wire:model='subject' class="form-control">
                                    <option value="">select subject</option>
                                    @forelse ($subjects as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                            ({{ $item->papers->count() }})
                                        </option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="subject" />
                            </div>
                            <div class="form-group">
                                <label for="">Class</label>
                                <select wire:model.lazy='class' class="form-control">
                                    <option value="">select class</option>
                                    @forelse ($classes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="class" />
                            </div>
                            <div class="form-group">
                                <label for="">Paper</label>
                                <select wire:model='paper' class="form-control">
                                    <option value="">select paper</option>
                                    @forelse ($papers as $item)
                                        <option value="{{ $item->id }}">{{ $item->paper }}</option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>
                                <x-error for="subject" />
                            </div>

                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" wire:model.lazy="date">
                                <x-error for="date" />
                            </div>
                            <div class="form-group">
                                <label for="">start Time</label>
                                <input type="time" class="form-control" wire:model="start_time">
                                <x-error for="start_time" />
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-lg-6">
                                    <label for="">Hours</label>
                                    <input type="number" class="form-control" wire:model="hours">
                                    <x-error for="hours" />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="">Minutes</label>
                                    <input type="number" class="form-control" wire:model="minutes">
                                    <x-error for="minutes" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">End Time</label>
                                <input type="time" class="form-control" readonly wire:model.lazy="end_time">
                                <x-error for="end_time" />
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark">save <span wire:loading wire:target='store'
                                        class=" spinner-border spinner-border-sm"></span> </button>
                            </div>



                        </form>
                    </x-modal-lg>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Term</th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Paper</th>
                                    <th>Level</th>
                                    <th>start Time</th>
                                    <th>Hours</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exams as $index => $item)
                                    <tr>
                                        <td scope="row">{{ $index }}</td>
                                        <td>{{ $item->term_name }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->classroom_name }}</td>
                                        <td>{{ $item->paper_paper }}</td>
                                        <td>{{ $item->level_name }}</td>
                                        <td>{{ $item->start_time }}</td>
                                        <td>{{ $item->hours }} : {{ $item->min }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary " type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                {{-- <a class="dropdown-item"
                                            wire:click.prevent="createClass({{ $item->id }})"
                                            href="#">Add</a> --}}
                                                <a class="dropdown-item"
                                                    wire:click.prevent="open_modal({{ $item->id }})"
                                                    href="#">Edit</a>
                                                <a class="dropdown-item"
                                                    wire:click.prevent="open_preview_modal({{ $item->term_id }}, {{ $item->classroom_id }})"
                                                    href="#">Preview PDF <i class="fa fa-file-pdf    "></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td scope="row" class="text-muted " colspan="7">Empty</td>
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
