<?php

namespace App\Http\Livewire\Timetables;

use App\Models\Classroom;
use App\Models\ClassTimeTable;
use App\Models\Slot;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TimetableClassesLivewire extends Component
{

    use LivewireAlert;
    use WithPagination;
    public $create_modal = false;
    public $ctts;
    public $ctt;
    public $classrooms = [];    
    public $class;
    
    public $slots = [];
    public function create(){
        $this->create_modal = true;
    }

    public function updatedDay($data){
        $this->slots = Slot::where('day',$data)->get();
    }

    public function store(){
        $this->validate([
            'class'=>'required',
        ]);
        $ctt = ClassTimeTable::where('classroom_id',$this->class)->get()->count();
        // dd($ctt);
    


        if($ctt == 0){
        $c = new ClassTimeTable();
        $c->classroom_id = $this->class;
        $c->save();
        $this->cancel();
        $this->alert('success','Successfull!');
        sleep(3);
        redirect()->route('timetable.class.show',$c->id);
        }else{
            $this->addError('class','Class time table exits select different Class');
            $this->alert('error','Class Time Table Exists!');
        }
    }


    public function cancel(){
        $this->reset(['create_modal','class']);
        $this->resetErrorBag();
    }


    public function render()
    {


        $this->classrooms = Classroom::All();
        $ctts = ClassTimeTable::join('classrooms','class_time_tables.classroom_id','=','classrooms.id')
        ->join('class_room_types','classrooms.classroom_type_id','=','class_room_types.id')
        // where('classrooms','like','%'.$ser)
        ->select('class_time_tables.*','classrooms.name As classroom_name','class_room_types.name As classtype_name','class_room_types.id As classtype_id')
        ->paginate(10);

        return view('livewire.timetables.timetable-classes-livewire')->with('timetables',$ctts);
    }
}
