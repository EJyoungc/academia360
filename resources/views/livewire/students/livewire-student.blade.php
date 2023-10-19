<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @section('bread')
        <div class="page-breadcrumb ">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Students</h3>
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('students') }}">Students</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $student->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <div class="row">

        {{-- addmodal --}}
        <div class="modal long-modal "@if ($assignmodal) style="display:block;" @endif tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" wire:click='cancel'>
                            <span aria-hidden="true">&times;</span>
                            <span wire:loading wire:target="cancel" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center h3">
                            Assign class
                        </div>
                        <form wire:submit.prevent="updateclass">
                            <div class="form-group">
                                <label for="">Academic year</label>
                                <select wire:model="a_year" class="form-control @error('a_year') is-invalid @enderror">
                                    <option value="">Select Year</option>
                                    @forelse ($academicyears as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->yearonly($item->start_date) }}/{{ $item->yearonly($item->end_date) }}
                                            @if ($item->is_current == 'true')
                                                (current)
                                            @endif
                                        </option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>

                                @error('a_year')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">year</label>
                                <select wire:model="year" class="form-control @error('year') is-invalid @enderror">
                                    <option value="">Select Year</option>
                                    @forelse ($classroomtypes as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}{{ $item->ctr }}
                                        </option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>

                                @error('year')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Class</label>

                                <select wire:model.defer="class"
                                    class="form-control @error('class') is-invalid @enderror">
                                    <option value="">Select Class</option>
                                    @forelse ($classes as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}{{ $item->ctr }}
                                        </option>
                                    @empty
                                        <option value="">Empty</option>
                                    @endforelse
                                </select>

                                @error('class')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark text-white form-control">
                                    <span wire:loading wire:target="updateclass">
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

        {{-- paymentmodal --}}
        <div class="modal long-modal "@if ($paymentmodal) style="display:block;" @endif tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" wire:click='cancel'>
                            <span aria-hidden="true">&times;</span>
                            <span wire:loading wire:target="cancel" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center h3">
                            Make Payment
                        </div>
                        <form wire:submit.prevent="storepayment">
                            <div class="form-group">
                                <label for="">Payment Type</label>
                                <select wire:model="payment_type"
                                    class="form-control @error('payment_type') is-invalid @enderror">
                                    <option value="">Select </option>
                                    <option value="cash">Cash</option>
                                    <option value="cash">Cheque</option>
                                    <option value="cash">Bank</option>
                                </select>

                                @error('payment_type')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">date</label>
                                <input type="date" wire:model.defer="date"
                                    class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" wire:model.defer="amount"
                                    class="form-control @error('amount') is-invalid @enderror">
                                @error('amount')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Referance ID</label>
                                <input type="text" wire:model.defer="reference_id"
                                    class="form-control @error('reference_id') is-invalid @enderror">
                                @error('reference_id')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark text-white form-control">
                                    <span wire:loading wire:target="storepayment">
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
        {{-- paymentmodal --}}



        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card bg-light">
                <div class="card-body bg-light ">
                    <center class="m-t-30"> <img
                            src="@if ($student->profile_photo_path == '') {{ asset('assets/uploads/images/face-0.jpg') }}  @else{{ asset('assets/uploads/' . $student->profile_photo_path) }} @endif"
                            class="rounded-circle" width="150">
                        <h4 class="card-title m-t-10">{{ $student->name }}</h4>
                        <h6 class="card-subtitle">{{ $student->gender }}</h6>
                        <div class="row text-center justify-content-md-center">

                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    @if ($student->academic_log_id == '')
                        <small class="text-muted">Class </small>
                        <div class="d-flex justify-content-between">
                            <h6 class="text-danger">Unassigned </h6><span><button
                                    wire:click='assignclass({{ $student->id }})' class="btn btn-sm btn-primary">
                                    <span wire:loading wire:target="assignclass({{ $student->id }})"
                                        class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    assign</button>

                            </span>
                        </div>
                    @else
                        <small class="text-muted">Class </small>
                        <div class="d-flex justify-content-between">
                            <h6> {{ $student->academiclog->classroom->crt->name}} {{$student->academiclog->classroom->name  }} ({{$student->academiclog->academicyear->yearonly($student->academiclog->academicyear->start_date)}}) </h6><span><button
                                    wire:click='assignclass({{ $student->id }})' class="btn btn-sm btn-primary">
                                    <span wire:loading wire:target="assignclass({{ $student->id }})"
                                        class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Edit</button>

                            </span>
                        </div>
                    @endif
                    <small class="text-muted p-t-30 db">Student email</small>
                    <h6>{{ $student->email }}</h6>
                    <small class="text-muted p-t-30 db">Student number</small>
                    @foreach ($student->mobiles as $contact )
                        <h6>{{ $contact->number }}</h6>
                    @endforeach
                    @foreach ($student->parent as $item)
                        <small class="text-muted p-t-30 db">{{ $item->guardian_role }}</small>
                        <h6>{{ $item->parent->name }}</h6>
                        <small class="text-muted p-t-30 db">{{ $item->guardian_role }}`s Email</small>
                        <h6>{{ $item->parent->email }}</h6>
                        <small class="text-muted p-t-30 db">{{ $item->guardian_role }}`s Number</small>

                        @foreach ($item->parent->mobiles as $contact)
                            <h6>+{{ $contact->number }}</h6>
                        @endforeach
                    @endforeach
                    {{-- {{$student->parent}} --}}
                    {{-- {{$student->parent}} --}}



                    <br>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month"
                            role="tab" aria-controls="pills-timeline" aria-selected="true">Payments Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month"
                            role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="current-month" role="tabpanel"
                        aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            @if ($folder == 'yearfolder')
                                <div>
                                    <div class="list-group" wire:target='updateclass'>
                                        @forelse($yearlog as $item)
                                            <a href="#" wire:click="selectyearfolder({{ $item->id }})"
                                                class="list-group-item list-group-item-action flex-column align-items-start @if ($item->status == 'current') active @endif">
                                                <span wire:loading wire:target="selectyearfolder({{ $item->id }})"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                <i class="fa fa-folder" aria-hidden="true"></i>
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">
                                                        {{ $item->yearonly($item->academicyear->start_date) }}/{{ $item->yearonly($item->academicyear->end_date) }}
                                                        @if ($item->status == 'current')
                                                            <span>(current)</span>
                                                        @endif
                                                    </h5>
                                                </div>

                                            </a>

                                        @empty
                                            <div
                                                class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex w-100 justify-content-center">
                                                    <h5 class="mb-1 text-muted">EMPTY</h5>

                                                </div>

                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            @endif

                            @if ($folder == 'termfolder')
                                <div>
                                    <div class="d-flex justify-content-end pb-1">

                                        <div class="px-1">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Print</a>
                                                    <a class="dropdown-item" wire:click.prevent="pdf_invoice()"
                                                        href="#">PDF</a>
                                                    <a class="dropdown-item" wire:click="send"
                                                        href="#">Share via Whatsapp  <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                      </a>

                                                      <a class="dropdown-item" wire:click="send"
                                                        href="#">Share via Telegram  <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                      </a>
                                                    <div class="dropdown-divider"></div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="pl-1">
                                            <button wire:click="back" class="btn btn-sm btn-info">
                                                <span wire:loading wire:target="back"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> back</button>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <table class="table table-hover ">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Term</th>
                                                    <th>Balance</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($termpayments as $item)
                                                    <tr>
                                                        <td scope="row">{{ $item->name }}</td>
                                                        <td>MWK <span
                                                                class="@if ($item->subtrac($item->payment->amount, $item->payment->total2($item->payment->pay_records)) >= 0) text-danger  @else text-success @endif ">{{ $item->subtrac($item->payment->amount, $item->payment->total2($item->payment->pay_records)) }}.00</span>
                                                        </td>
                                                        <td><span class="fw-bold">MWk</span>
                                                            {{ $item->payment->amount }}.00</td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-sm btn-primary"
                                                                    title="view payment records"
                                                                    wire:click="selectpaymentrecordsfolder({{ $item->id }})"><i
                                                                        class="fa fa-eye" aria-hidden="true"></i>
                                                                    view
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                                    data-toggle="dropdown" title="options"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                                        title="Print">Print</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)"
                                                                        title="Generate PDF">PDF</a>
                                                                    <a class="dropdown-item" href="#"
                                                                        title=" Send to parent via Whatspp">Whatsapp</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0)">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" scope="row">Empty</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <thead class="">
                                                <tr class="table-secondary">
                                                    <th>total</th>
                                                    <th>MWK <span
                                                            class="@if ($yearly_total == 0) text-success  @else text-danger @endif ">{{ $yearly_balance }}.00</span>
                                                    </th>
                                                    <th>MWK {{ $yearly_total }}.00</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            @if ($folder == 'paymentsrecfolder')
                                <div>
                                    <div class="d-flex justify-content-end pb-1">

                                        <div class="px-1">
                                            <a href="#" wire:click='createpayment'
                                                class="btn btn-sm btn-primary">
                                                <span wire:loading wire:target="createpayment"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                make payment
                                            </a>
                                        </div>
                                        <div class="pl-1">
                                            <button wire:click="back" class="btn btn-sm btn-info">
                                                <span wire:loading wire:target="back"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> back</button>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <table class="table table-hover ">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($termpaymentrecords as $item)
                                                    <tr>
                                                        <td scope="row">{{ $item->date }}</td>
                                                        <td>{{ $item->payment_type }}</td>
                                                        <td><span class="fw-bold">MWk</span>
                                                            {{ $item->amount }}.00</td>
                                                        <td><button class="btn btn-sm btn-primary">Edit</button></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted"
                                                            scope="row">
                                                            EMPTY</td>

                                                    </tr>
                                                @endforelse



                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(123) 456 7890</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">johnathan@admin.com</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">London</p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                                enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                                mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean
                                vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                                ac, enim.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries </p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                                including versions of Lorem Ipsum.</p>
                            <h4 class="font-medium m-t-30">Skill Set</h4>
                            <hr>
                            <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span
                                        class="sr-only">50%
                                        Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span
                                        class="sr-only">50%
                                        Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span
                                        class="sr-only">50%
                                        Complete</span> </div>
                            </div>
                            <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span
                                        class="sr-only">50%
                                        Complete</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel"
                        aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>



</div>
