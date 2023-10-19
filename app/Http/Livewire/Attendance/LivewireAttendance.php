<?php

namespace App\Http\Livewire\Attendance;

use App\Models\AcademicYearStudentLog;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LivewireAttendance extends Component
{

    use LivewireAlert;
    protected $listeners = ['store_attendance'];
    public $classroom_id;
    public $at = [];
    public $students = [];
    public $current_date;
    public $date_status = true;
    public $modal = false;
    public Collection $inputs;
    public $input;
    public $editing_id;
    
    protected $rules = [
        'inputs.*.status' => 'required|in:present,absent,late',


    ];

    protected $messages = [
        'inputs.*.status.required' => 'This student not ticked',
        'inputs.*.status.in:present,absent,late' => 'Tick either Late, Present, Absent',
        // 'inputs.*.phone_type.required' => 'This phone type field must be numeric',
    ];

    public function cancel()
    {
        $this->reset(['modal']);
        $this->fill([
            'inputs' => collect([]),
        ]);
    }


    public function create()
    {
        $this->modal = true;
        foreach ($this->students  as $index => $item) {
            $this->inputs->push([
                'student_name' => $item->student->name,
                'student_id' => $item->student_id,
                'classroom_id' => $this->classroom_id,
                'status' => '',
                'date' => $this->current_date
            ]);
        }
    }


    public function addstudents()
    {
        $this->validate();
        // dd('somthing is is wrong');
        $this->alert('question', 'Do you want to save the attendance register ?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'Cancel',
            'position' => 'center',
            'timer' => null,
            'showCancelButton' => true,
            'onConfirmed' => 'store_attendance',
            'backdrop' => true,
            'toast' => false
        ]);
    }



    public function change_attendance($id, $value)
    {
        $at = Attendance::find($id);
        $at->status = $value;
        $at->save();
        $this->alert('success', 'updated !');
    }


    public function store_attendance()
    {

        foreach ($this->inputs as $item) {

            $at = new Attendance();
            $at->classroom_id = $item['classroom_id'];
            $at->student_id = $item['student_id'];
            $at->teacher_id = Auth::user()->id;
            $at->date =  $item['date'];
            $at->status =  $item['status'];
            $at->save();
        }

        $this->cancel();

        $this->alert('success', 'Successful !');
    }

    public function updatedCurrentDate()
    {
        $this->checkdate();
    }

    public function checkdate()
    {
        $date = Carbon::parse($this->current_date);
        if ($date->isToday()) {
            $this->date_status = true;
        } else {
            $this->date_status = false;
        }
    }



    public function mount($classroom_id)
    {
        $this->classroom_id = $classroom_id;
        $this->students = AcademicYearStudentLog::where('classroom_id', $this->classroom_id)->get();

        $this->current_date = Carbon::today()->format('Y-m-d');


        $this->fill([
            'inputs' => collect([]),
        ]);
    }
    public function render()
    {
        $absent_count = Attendance::where('classroom_id', $this->classroom_id)->where('date', 'Like', '%' . $this->current_date . '%' ?? '%' . '' . '%')->where('status','absent')
            ->get()->count();
        $present_count = Attendance::where('classroom_id', $this->classroom_id)->where('date', 'Like', '%' . $this->current_date . '%' ?? '%' . '' . '%')->where('status','present')
            ->get()->count();
        $late_count = Attendance::where('classroom_id', $this->classroom_id)->where('date', 'Like', '%' . $this->current_date . '%' ?? '%' . '' . '%')->where('status','late')
            ->get()->count();
        $at = Attendance::where('classroom_id', $this->classroom_id)->where('date', 'Like', '%' . $this->current_date . '%' ?? '%' . '' . '%')
            ->get();
        return view('livewire.attendance.livewire-attendance')
        ->with('attendance', $at)
        ->with('absent_count',$absent_count)
        ->with('late_count',$late_count)
        ->with('present_count',$present_count);
    }
}
