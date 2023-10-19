<?php

namespace App\Http\Livewire\Classes;

use App\Models\ClassLevel;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LivewireClasses extends Component
{
    use LivewireAlert;

    public $addmodal = false;
    public $updatemodal = false;
    public $updateclassmodal = false;
    public $addclassmodal = false;
    public $cr, $crt_id, $cr_id;
    public $level;

    // form
    public $name;

    public function create()
    {
        $this->addmodal = true;
    }
    public function createClass($id)
    {
        $this->crt_id = $id;
        $this->addclassmodal = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'level'=>'required'
        ]);

        ClassRoomType::create([
            'name' => $this->name,
            'level_id'=>$this->level
        ]);

        $this->cancel();
        $this->alert('success', 'succefully added');
    }

    public function editClass($id)
    {
        $this->cr_id = $id;
        $cr = Classroom::find($id);
        $this->name = $cr->name;
        $this->updateclassmodal = true;
    }

    public function classroom_update()
    {
        $this->validate(['name' => 'required|string']);
        $cr = Classroom::find($this->cr_id);
        $cr->name = $this->name;
        $cr->save();

        $this->cancel();
        $this->alert('success', 'successfully Updated');
    }
    public function classroom_store()
    {
        $this->validate(['name' => 'required|string']);
        Classroom::create([
            'name' => $this->name,
            'classroom_type_id' => $this->crt_id,
        ]);

        $this->cancel();
        $this->alert('success', 'successfully added');
    }
    public function edit($id)
    {
        $this->updatemodal = true;
        $crt = ClassRoomType::find($id);
        $this->name = $crt->name;
        $this->level = $crt->level_id;
        $this->crt_id = $crt->id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'level'=>'required'
        ]);
        $cr = ClassRoomType::find($this->crt_id);
        $cr->level_id =$this->level;
        $cr->name = $this->name;
        $cr->save();

        $this->cancel();
        $this->alert('success', 'successfully Updated');
    }

    public function cancel()
    {
        $this->reset(['name', 'cr', 'crt_id', 'cr_id', 'updatemodal', 'addmodal', 'addclassmodal', 'updateclassmodal', 'level']);
    }

    public function render()
    {
        $levels = ClassLevel::all();
        $crt = ClassRoomType::whereLike(['name'], $this->search ?? '')->latest()->paginate(4);
        return view('livewire.classes.livewire-classes')->with('crt', $crt)->with('levels', $levels);
    }
}
