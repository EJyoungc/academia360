<?php

namespace App\Http\Livewire\Academicyear;

use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class LivewireAcademicYear extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $addmodal = false;
    public $updatemodal = false;
    public $termmodal = false;
    public $academic_year;
    public $terms = [];
    public $term;
    public $btnTitle ="Add";
    public $search;
    protected $queryString = ['search'];




    // term form
    public $t_name, $t_start_date, $t_end_date;


    // academic year form
    public $start_date, $end_date, $is_current ='false';

    public function create()
    {
        $this->addmodal = true;
    }

    // Term fucntions


    public function viewterms($id)
    {
        $this->termmodal = true;
        $this->academic_year = $id;
        $this->terms = AcademicTerm::where('academic_year_id', $this->academic_year)->get();
    }

    public function term_store()
    {
        if ($this->term == null) {
            $check = AcademicTerm::where('academic_year_id', $this->academic_year)->get()->count();
            // dd($check);

            if ($check >= 3) {
                $this->alert('warning', 'reached maximum number of terms!');
            } else {
                $this->validate([
                    't_start_date' => 'required|date',
                    't_end_date' => 'required|date',
                    't_name' => 'required|string',
                ]);

                AcademicTerm::create([
                    'start_date' => $this->t_start_date,
                    'end_date' => $this->t_end_date,
                    'name' => $this->t_name,
                    'academic_year_id' => $this->academic_year
                ]);
                $this->reset([
                    't_start_date',
                    't_end_date',
                    't_name',
                ]);
                $this->terms = AcademicTerm::where('academic_year_id', $this->academic_year)->get();
                $this->alert('success', 'Succefully Updated!');
            }
        } else {
            $this->update_term();
        }
    }

    public function edit_term($id)
    {
        $at = AcademicTerm::find($id);
        $this->term = $at->id;
        $this->t_end_date = $at->end_date;
        $this->t_start_date = $at->start_date;
        $this->t_name = $at->name;
        $this->btnTitle = "Update";
    }

    public function update_term()
    {
        $this->validate([
            't_start_date' => 'required|date',
            't_end_date' => 'required|date',
            't_name' => 'required|string',
        ]);
        $at = AcademicTerm::find($this->term);

        $at->end_date = $this->t_end_date;
        $at->start_date = $this->t_start_date;
        $at->name = $this->t_name;
        $at->save();
        $this->reset([
            't_start_date',
            't_end_date',
            't_name',
            'term',
            'btnTitle'
        ]);
        $this->terms = AcademicTerm::where('academic_year_id', $this->academic_year)->get();
        $this->alert('success', 'Succefully Updated!');
    }
    // academic year fucntions



    public function store()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',

        ]);
        $start = Carbon::parse($this->start_date)->format('Y');
        $end =Carbon::parse($this->end_date)->format('Y');
        

        





        $ay = AcademicYear::where('start_date','like','%'.$start.'%')->where('end_date','like','%'.$end.'%')->get()->count();
        // dd($ay);
        if ($ay  > 0) {
            $this->alert('warning', 'Current Academic year Exist');
            $this->addError('start_date','Academic year Exist');
            $this->addError('end_date','Academic year Exists');
            
        } else {
            AcademicYear::create([
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'is_current' => $this->is_current,
            ]);
            $this->cancel();
            $this->alert('success', 'Succefully Updated!');
        }
    }

    public function edit($id)
    {

        $this->updatemodal = true;
        $this->academic_year = $id;
        $ay = AcademicYear::find($id);
        $this->start_date = $ay->start_date;
        $this->end_date = $ay->end_date;
        $this->is_current = $ay->is_current;

    }


    public function update()
    {
        $this->validate([
            'start_date' => 'required|date',
            'start_date' => 'required|date|after_or_equal:start_date',

        ]);

            $ay = AcademicYear::find($this->academic_year);
            $ay->start_date = $this->start_date;
            $ay->end_date = $this->end_date;
            $ay->is_current = $this->is_current;
            $ay->save();
            $this->cancel();
            $this->alert('success', 'Succefully Updated!');
    }
    public function cancel()
    {
        $this->reset(['start_date', 'end_date', 'is_current', 'updatemodal', 'addmodal', 'academic_year', 't_start_date', 't_end_date', 't_name', 'termmodal']);
    }
    public function make_current($id){
        $ay = AcademicYear::all();
        foreach($ay as $item){
            $aye = AcademicYear::find($item->id);
            if($aye->is_current == 'true'){
                $aye->is_current = 'false';
                $aye->save();
            }
        }
        $ay = AcademicYear::find($id);
        $ay->is_current = "true";
        $ay->save();
        $this->alert('success', 'Succefully Activated Academic Year');

    }
    public function render()
    {
        $ay = AcademicYear::whereLike(['start_date','end_date'],$this->search ?? '')
        ->latest()
        ->paginate(10);
        return view('livewire.academicyear.livewire-academic-year')->with('academicyears', $ay);
    }
}
