<?php

namespace App\Http\Livewire\Timetables;

use App\Models\Classroom;
use App\Models\ClassTimeTable;
use App\Models\Slot;
use App\Models\SlotSubject;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TimetableClassLivewire extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $create_modal = false;
    public Collection $inputs;
    public $subjects = [];    
    public $teachers = [];
    public $teacher;
    public $slot;    
    public $classroom;
    public $subject;
    public $slots = [];
    public function create(){
        $this->create_modal = true;
    }

    public function mount($id){
        $this->classroom = Classroom::find($id);
        $this->fill([
            'inputs'=>collect([['teacher'=>'','subject'=>'']])
        ]);
    }

    public function addno(){
        $this->inputs->push(['teacher'=>'','subject'=>'']);
   
    }
    public function removeno($key)
    {
        $this->inputs->pull($key);
    }
    
    public function store(){
        
        
    }


    public function cancel(){
        $this->reset(['create_modal']);
    }
    

    public function render()
    {
        $this->teachers = User::where('role','teacher')->get();
        $this->subjects = Subject::all();
        $ctt= SlotSubject::all();
        $this->slots = Slot::all();
        return view('livewire.timetables.timetable-class-livewire')->with('timetable',$ctt);
    }
}
