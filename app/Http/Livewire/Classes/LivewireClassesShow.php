<?php

namespace App\Http\Livewire\Classes;

use App\Models\AcademicYearStudentLog;
use App\Models\Classroom;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

use DefStudio\Telegraph\Models\TelegraphChat;




class LivewireClassesShow extends Component
{

    use LivewireAlert;
    public $classroom;
    public $classroom_id;
    // collection
    public $teachers;
    // modal
    public $assign_teacher_modal = false;
    // form
    public $teacher;


    


    public function bottest(){

        $chat = TelegraphChat::find(1);
        // dd($chat);
        $chat->html("<strong>Hello!</strong>\n\nI'm here! \n\n Weclome To Hill TOP")->send();
        
        

    }

    public function open_atm_modal(){
        $this->assign_teacher_modal = true;
        $this->teacher = $this->classroom->teacher->id ?? null;
    }

    public function assign_teacher(){
        $this->validate([
            'teacher'=>'required|numeric'
        ]);
        $cr = Classroom::find($this->classroom_id);
        $cr->teacher_id =$this->teacher;
        $cr->save();
        $this->cancel();
        $this->alert('success','successfull');
        $this->classroom = Classroom::find($this->classroom_id);
        
    }

    public function cancel(){
        $this->reset(['assign_teacher_modal','teacher']);
    }



    public function mount($classroom_id){
        $this->classroom_id = $classroom_id;
        $this->classroom = Classroom::find($classroom_id);
        $this->teachers = User::where('role','teacher')->where('status','active')->get();
    }





    public function render()
    {
        // $terms =  
        $students = AcademicYearStudentLog::where('status','current')->where('classroom_id',$this->classroom_id)->get();
        return view('livewire.classes.livewire-classes-show')->with('students',$students);
    }
}
