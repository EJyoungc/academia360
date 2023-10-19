<?php

namespace App\Http\Livewire\Students;

// use App\Models\Student;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LivewireStudents extends Component
{

    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public $addmodal = false;
    public $editmodal = false;
    public $updateclassmodal = false;
    public $addclassmodal = false;
    public $st_id;
    protected $queryString = ['search'];
    public $search;

    // form
    public $classroom, $name, $date_of_birth, $parent, $image,$gender ;

    public function store(){
        
        $this->validate([
           'name'=>'required|string',
            'date_of_birth'=>'required|date',
            'parent'=>'required',
            'image' => 'required|image|max:5120',
            'gender'=>'required'
        ]);

        $file = $this->image->store('images');
        User::create([
            'name'=>$this->name,
            'dob'=>$this->date_of_birth,
            'parent_id'=>$this->parent,
            'gender'=>$this->gender,
            'cover'=>$file,

        ]);

       $this->cancel();
       $this->alert('success','successfully added');

    }

    public function create()
    {
        $this->addmodal = true;
    }

    public function cancel()
    {
        $this->reset(['addmodal', 'editmodal','name','date_of_birth','parent','st_id','image','gender']);
    }



    public function render()
    {
        $st = User::where('role','student')->paginate(10);
        $pt = User::where('role','guardian')->get();
        return view('livewire.students.livewire-students')->with('students', $st)->with('parents',$pt);
    }
}
