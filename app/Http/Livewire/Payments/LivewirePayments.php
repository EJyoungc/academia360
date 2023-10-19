<?php

namespace App\Http\Livewire\Payments;

use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use App\Models\Payment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class LivewirePayments extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $addmodal = false;
    public $editmodal = false;
    public $editallmodal = false;
    public $classes = [];
    public $terms = [];
    public $years = [];
    public $year;
    public $singleterm;
    // form
    public $class, $term = "all", $academic_year, $amount, $name;


    public function create()
    {
        $this->addmodal = true;
    }
    public function editall($id)
    {
        $terms = AcademicTerm::where('academic_year_id', $id)->get();
    }
    public function edit($id)
    {
        $this->editmodal = true;
        $this->singleterm = $id;
        $t = AcademicTerm::find($id);
        $this->amount = $t->amount;
        $this->name = $t->name;
        $this->term = $t->academic_term_id;
        $this->academic_year = $t->academic_year_id;
        $this->class = $t->class_id;
    }

    public function cancel()
    {
        $this->reset(['addmodal', 'editmodal', 'name', 'term', 'amount', 'year', 'academic_year', 'class']);
    }

    public function updatedYear()
    {
        // dd($this);
        $this->alert('success', ' form changed');
        $this->terms = AcademicTerm::where('academic_year_id', $this->year)->get();
    }

    public function mount()
    {
        $this->classes = ClassRoomType::all();
        // $this->terms = AcademicTerm::all();
        $this->years = AcademicYear::all();
    }

    public function store()
    {
        // dd($this);
        $this->validate([
            'name' => 'required|string',
            'term' => 'required',
            'amount' => 'required|numeric',
            'year' => 'required',
            'class' => 'required'
        ]);
        // dd($this->class);
        if ($this->term == "all") {
            $at = AcademicTerm::where('academic_year_id', $this->year)->get();
            foreach ($at as $item) {
                Payment::create([
                    'name' => $this->name,
                    'academic_term_id' => $item->id,
                    'amount' => $this->amount,
                    'academic_year_id' => $this->year,
                    'classtype_id' => $this->class,
                ]);
            }
            $this->cancel();
            $this->alert('success', 'successfully added');
        } else {
            Payment::create([
                'name' => $this->name,
                'academic_term_id' => $this->term,
                'amount' => $this->amount,
                'academic_year_id' => $this->year,
                'classtype_id' => $this->class,
            ]);

            $this->cancel();
            $this->alert('success', 'successfully added');
        }
    }



    public function render()
    {
        $payments = Payment::paginate();
        return view('livewire.payments.livewire-payments')->with('payments', $payments);
    }
}
