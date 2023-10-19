<?php

namespace App\Http\Livewire\Slots;

use App\Models\Slot;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class SlotsLivewire extends Component
{

    use LivewireAlert;
    use WithPagination;
    
    public $create_modal = false;
    public $edit_modal = false;
    public $day,$time;
    public $slot;
    public function create(){
        $this->create_modal = true;
    }

    public function open_edit_modal($id){
        $this->slot = Slot::find($id);
        $this->day = $this->slot->day;
        $this->time= $this->slot->start;
        $this->edit_modal = true;
        
    }
    public function cancel(){
        $this->reset(['create_modal','day','time']);
    }


    public function update(){
        $this->validate([
            'day'=>'required|string',
            'time'=>'required'
        ]);
        $this->slot->day = $this->day;
        $this->slot->start = $this->time;
        $this->slot->save();
        $this->cancel();
        $this->alert('success','updated !');
    }


    public function store(){
        $this->validate([
            'day'=>'required|string',
            'time'=>'required'
        ]);

       $s = new Slot();
       $s->day = $this->day;
       $s->start = $this->time;
       $s->save();
       $this->cancel();
       $this->alert('success','successful!');
    }

    


    
    public function render()
    {
        $slots = Slot::paginate(10);
        return view('livewire.slots.slots-livewire')->with('slots',$slots);
    }
}
