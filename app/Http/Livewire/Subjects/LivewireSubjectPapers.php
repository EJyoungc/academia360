<?php

namespace App\Http\Livewire\Subjects;

use App\Models\ClassLevel;
use App\Models\ClassRoomType;
use App\Models\Subject;
use App\Models\SubjectPaper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class LivewireSubjectPapers extends Component
{

    use LivewireAlert;
    use WithPagination;
    public $subject_id;
    public $subject;
    public  $modal = false;
    public $paper;
    public $title = 'add';
    public $classtypes = [];
    // form
    public $mark, $name, $level,$class;
    public function create()
    {
        $this->modal = true;
    }

    public function edit($id)
    {   $this->title = 'edit';
        $this->modal =true;
        $this->paper = SubjectPaper::find($id);
        $this->name = $this->paper->paper;
        $this->mark = $this->paper->mark;
        $this->level = $this->paper->level_id;
        $this->classtypes =ClassRoomType::where('level_id',$this->level)->get();
        $this->class = $this->paper->classroom_type_id;
        


    }



    public function submit(){
        $this->validate([
            'mark'=>'required|numeric',
            'level'=>'required|numeric',
            'name'=>'required|string',
            'class'=>'required',
        ]);

        if($this->title =='add'){
           
            $p = new SubjectPaper();
            $p->paper = $this->name;
            $p->mark = $this->mark;
            $p->level_id = $this->level;
            $p->subject_id = $this->subject_id;
            $p->classroom_type_id = $this->class;
            $p->save();
            $this->cancel();
            $this->alert('success','Successful');
        }else{
            $p =  SubjectPaper::find($this->paper->id);
            $p->paper = $this->name;
            $p->mark = $this->mark;
            $p->level_id = $this->level;
            $p->subject_id = $this->subject_id;
            $p->classroom_type_id = $this->class;
            $p->save();
            $this->cancel();
            $this->alert('success','Successful'); 
        }
    }

    public function cancel(){
        $this->reset(['name','mark','level','modal','title','class']);
    }

    public function updatedLevel(){
        $this->classtypes =ClassRoomType::where('level_id',$this->level)->get();
    }

    public function mount($id)
    {
        $this->subject_id = $id;
        $this->subject = Subject::find($id);
    }
    public function render()
    {
        $levels = ClassLevel::all();
        $paper = SubjectPaper::where('subject_id', $this->subject_id)->latest()->paginate(5);
        return view('livewire.subjects.livewire-subject-papers')->with('papers', $paper)->with('levels',$levels);
    }
}
