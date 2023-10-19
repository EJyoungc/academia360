<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class LivewireSubjects extends Component
{

    use LivewireAlert;
    use WithPagination;


    public $modal = false;
    public $title = "add";
    public $subject;
    public $name;
    public $addpaper = false;
    

    public function create($id=null){
        if($id == null){
            $this->title = 'add';
        }else{
            $this->subject = Subject::find($id);
            $this->name = $this->subject->name;
            $this->title = 'edit';
        }
        $this->modal = true;
    }

    public function store (){
        $this->validate(['name'=>'required|string|min:2']);
        if($this->title=='add'){
        $s = new Subject();
        $s->name = $this->name;
        $s->save();
        $this->cancel();
        $this->alert('success','successful');
        if($this->addpaper){
            return redirect()->route('subjects.papers',$s->id);
        }
        }else{
        $this->subject->name = $this->name;
        $this->subject->save();
        $this->cancel();
        $this->alert('success','successful');
        }
    }


    

    public function cancel(){
        $this->reset(['name','modal','title']);
    }
    


    
    public function render()
    {   
        $subjects = Subject::latest()->paginate(6);
        return view('livewire.subjects.livewire-subjects')->with('subjects',$subjects);
    }
}
