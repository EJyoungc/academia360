<?php

namespace App\Http\Controllers;

use App\Models\AcademicTerm;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use App\Models\ExamTimeTable;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;


class PdfController extends Controller
{
    //

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function term_timetable($term_id, $class_id)
    {
        $term = AcademicTerm::find($term_id);
        $class = ClassRoomType::find($class_id);
        $exams = ExamTimeTable::join('subject_papers', 'subject_papers.id', '=', 'exam_time_tables.paper_id')
            ->join('class_room_types', 'class_room_types.id', '=', 'subject_papers.classroom_type_id')
            ->join('class_levels', 'class_levels.id', '=', 'exam_time_tables.level_id')
            ->join('subjects', 'subjects.id', '=', 'exam_time_tables.subject_id')
            ->join('academic_terms', 'academic_terms.id', '=', 'exam_time_tables.term_id')
            ->where('exam_time_tables.term_id',$term_id)
            ->where('subject_papers.classroom_type_id',$class_id)
            ->select('exam_time_tables.*', 'subjects.name AS subject_name', 'class_levels.name As level_name', 'subject_papers.paper As paper_paper', 'academic_terms.name As term_name', 'class_room_types.name as classroom_name', 'class_room_types.id as classroom_id')
            // ->orderBy('exam_time_tables.date','desc')
            ->get();

        // dd($class);



        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 16);
        // $this->fpdf->Cell(20);
        // $this->fpdf->Cell(30);

        $this->fpdf->Cell(50, 30, 'Logo', 1, 0, 'C');
        $this->fpdf->Cell(80);
        $this->fpdf->Cell(50, 30, 'Logo2', 1, 0, 'C');
        // $this->fpdf->Ln(30);
        // $this->fpdf->Cell(50, 30, 'Logo3', 1, 0, 'C');
        // Move to the right
        // $this->fpdf->Cell(30);

        
        // title
        $this->fpdf->Ln(35);
        // $this->fpdf->Cell(80);
        $this->fpdf->Cell(20);
        $this->fpdf->Cell(30);
        $this->fpdf->cell(5);

        $this->fpdf->Cell(70, 10, " $class->name  $term->name  Examination Time Table ", 0, 0, 'C');
        // $this->fpdf->cell(1);

        // Line break

        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Ln(10);

        $this->fpdf->cell(5);
        $this->fpdf->Cell(36, 7, 'Subject', 1, 0, 'C');;
        $this->fpdf->Cell(36, 7, 'Paper', 1, 0, 'C');;
        $this->fpdf->Cell(36, 7, 'Time ', 1, 0, 'C');;
        $this->fpdf->Cell(36, 7, 'Hours', 1, 0, 'C');;
        $this->fpdf->Cell(36, 7, 'Date', 1, 0, 'C');
        // ;$this->fpdf->Cell(30, 10, '# ', 1, 0, 'C');



        foreach ($exams as $item) {
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial', '', 9);
            $this->fpdf->cell(5);
            $this->fpdf->Cell(36, 5, "$item->subject_name", 0, 0, 'C');;
            $this->fpdf->Cell(36, 5, "$item->paper_paper", 0, 0, 'C');;
            $this->fpdf->Cell(36, 5, "$item->start_time", 0, 0, 'C');;
            $this->fpdf->Cell(36, 5, "$item->hours : $item->min", 0, 0, 'C');;
            $this->fpdf->Cell(36, 5, "$item->date", 0, 0, 'C');



            
            // ;$this->fpdf->Cell(30, 10, '# ', 1, 0, 'C');

        }
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Ln(10);
        $this->fpdf->cell(5);
        $this->fpdf->Cell(180, 0, "", 1, 0, 'C');;
        $this->fpdf->Ln(0);
        $this->fpdf->cell(5);
        
        $this->fpdf->Cell(60, 5, 'Good Luck...',0, 0, '');
        $this->fpdf->SetFont('Arial', '', 11);




        $this->fpdf->Output();
        exit;

        //    dd($term_id ,$class_id);
    }
}
