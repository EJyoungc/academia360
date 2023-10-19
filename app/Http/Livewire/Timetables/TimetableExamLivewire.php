<?php

namespace App\Http\Livewire\Timetables;

use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\ClassLevel;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use App\Models\ExamTimeTable;
use App\Models\Subject;
use App\Models\SubjectPaper;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TimetableExamLivewire extends Component
{

    use LivewireAlert;
    public $ex_id;
    public $link;
    public $create_modal = false;
    public $preview_modal = false;
    public $terms = [], $academic_years = [], $levels = [], $classes = [], $subjects = [], $papers = [],$filter_terms=[];
    public $term,$filter_term, $academic_year, $level, $paper, $subject, $class, $date, $start_time, $end_time, $hours = 0, $minutes = 0;
    public $examtimetable;
    public $search;
    public $title = "add";


    public function open_modal($id = null)
    {
        $this->ex_id = $id;
        $this->examtimetable  = ExamTimeTable::find($id);
        
        if ($this->ex_id == null) {
            $this->title = 'add';
            $this->create_modal = true;
        } else {
            $this->title = 'edit';
            
            
            $x  = ExamTimeTable::find($id);
            $at = AcademicTerm::find($x->term_id);
            $this->terms = AcademicTerm::where('academic_year_id',$at->academic_year_id)->get();
            $this->classes = ClassRoomType::where('level_id', $x->level_id)->get();
            $p = SubjectPaper::find($x->paper_id);
            $this->class = $p->classroom_type_id;
            $this->papers = SubjectPaper::where('classroom_type_id',$p->classroom_type_id)->get();
            $this->academic_year = $at->academic_year_id;
            $this->start_time = $x->start_time;
            (int) $this->hours= $x->hours;
            $this->date = $x->date;
            (int)$this->minutes = (int)$x->min  ;
            $this->updatetime();
            $this->term = $x->term_id;
            $this->level = $x->level_id;
            $this->paper= $x->paper_id ;
            $this->subject = $x->subject_id;  
            $this->create_modal = true;
        }
        
    }

   public function open_preview_modal($term_id,$class_id){
        $this->link = [$term_id ,$class_id];
        $this->preview_modal = true;
   }


   
    

    

    public function updatedAcademicYear($id)
    {

        $this->terms = AcademicTerm::where('academic_year_id', $id)->get();
    }
    public function updatedLevel($id)
    {

        $this->classes = ClassRoomType::where('level_id', $id)->get();
    }

    public function updatedSubject($id)
    {
        // $this->papers =  SubjectPaper::where('classroom_type_id',$id)->where('subject_id',)->get();
        // $this->terms = AcademicTerm::where('academic_year_id',$id)->get();
    }

    public function updatedClass($id)
    {

        $this->papers =  SubjectPaper::where('classroom_type_id', $id)->where('subject_id', $this->subject)->get();
        // $this->terms = AcademicTerm::where('academic_year_id',$id)->get();
    }

    public function updatedStartTime()
    {
        $this->updatetime();
    }

    public function updatetime()
    {
        $time = Carbon::parse($this->start_time);
        $this->end_time = $time->addHours((int)$this->hours)->addMinutes((int)$this->minutes)->format('H:i');
    }


    public function updatedHours()
    {
        // $time = Carbon::parse($this->start_time);
        // $this->end_time = $time->addHours($this->hours)->format('H:i');
        $this->updatetime();
    }

    public function updatedMinutes()
    {

        $this->updatetime();
    }

    public function store()
    {
        $this->validate([
            'term' => 'required',
            'academic_year' => 'required',
            'level' => 'required',
            'paper' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'minutes' => 'required|numeric',
            'hours' => 'required|numeric'
        ]);
        // dd($this);

        if($this->ex_id != null ){

            $this->examtimetable->hours =  (int)$this->hours;
            $this->examtimetable->min = (int)$this->minutes;
            $this->examtimetable->term_id = $this->term;
            $this->examtimetable->level_id = $this->level;
            $this->examtimetable->date = $this->date;
            $this->examtimetable->start_time = $this->start_time;
            $this->examtimetable->paper_id = $this->paper;
            $this->examtimetable->subject_id = $this->subject;
            $this->examtimetable->save();
            $this->cancel();
            $this->alert('success','successfully updated');
            // dd($this->title, $this->ex_id);
            

        }else{
            // dd($this->title,$this->ex_id);
            
            $x  = new  ExamTimeTable();
            $x->hours = (int)$this->hours;
            $x->min = (int)$this->minutes;
            $x->date = $this->date;
            $x->term_id = $this->term;
            $x->level_id = $this->level;
            $x->start_time = $this->start_time;
            $x->paper_id = $this->paper;
            $x->subject_id = $this->subject;
            $x->save();
            $this->cancel();
            $this->alert('success','successfully');

           
        }

        
        
    }



    public function cancel(){
        $this->reset([
            'term',
            'academic_year',
            'level',
            'paper',
            'subject',
            'class',
            'date',
            'start_time',
            'end_time',
            'minutes',
            'hours',
            'create_modal',
            'preview_modal'
        ]);
    }

    public function render()
    {
        $this->academic_years = AcademicYear::all();
        $this->levels = ClassLevel::all();
        $this->subjects = Subject::all();
        $exams =  ExamTimeTable::all();

        $exams = ExamTimeTable::join('subject_papers','subject_papers.id','=','exam_time_tables.paper_id') 
        ->join('class_room_types','class_room_types.id','=','subject_papers.classroom_type_id')
        ->join('class_levels','class_levels.id','=','exam_time_tables.level_id')
        ->join('subjects','subjects.id','=','exam_time_tables.subject_id')
        ->join('academic_terms','academic_terms.id','=','exam_time_tables.term_id')
        ->select('exam_time_tables.*','subjects.name AS subject_name','class_levels.name As level_name','subject_papers.paper As paper_paper','academic_terms.name As term_name','class_room_types.name as classroom_name','class_room_types.id as classroom_id')
        ->orwhere('subjects.name', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
        ->orwhere('class_levels.name', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
        ->orwhere('academic_terms.name', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
        ->orwhere('subject_papers.paper', 'Like', '%' . $this->search . '%' ?? '%' . '' . '%')
        ->get();

        return view('livewire.timetables.timetable-exam-livewire')->with('exams',$exams);
    }
}
