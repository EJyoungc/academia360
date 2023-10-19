<?php

namespace App\Http\Livewire\Students;

use App\Models\AcademicTerm;
use App\Models\AcademicYear;
use App\Models\AcademicYearStudentLog;
use GuzzleHttp\Client as Axios;
use App\Models\Classroom;
use App\Models\ClassRoomType;
use App\Models\PaymentRecord;
use App\Models\User as Student;
// use Codedge\Fpdf\Facades\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Netflie\WhatsAppCloudApi\Message\Template\Component  as CP;
use Netflie\WhatsAppCloudApi\Message\OptionsList\Row;
use Netflie\WhatsAppCloudApi\Message\OptionsList\Section;
use Netflie\WhatsAppCloudApi\Message\OptionsList\Action;




class LivewireStudent extends Component
{

    use LivewireAlert;
    // public $academicyears;
    public $yearly_total;
    public $yearly_balance;
    public $a_year;
    public $folder = "yearfolder";
    public $is_payment_records = true;
    public $termpaymentrecords = [];
    public $is_year_selected = false;
    public $termpayments;
    public $termpayments_id;
    public $payment_id;
    public $student;
    public $stu_id;
    public $assignmodal = false;
    public $paymentmodal = false;
    public $classroomtypes;
    public $classes = [];
    public $yearlog = [];
    public $class;
    public $year;
    public $log_id;
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    //payment form
    public $date, $payment_type, $amount, $reference_id;


    public function storepayment()
    {
        $this->validate([
            'date' => 'required|date',
            'payment_type' => 'required|string',
            'amount' => 'required|numeric',
            'reference_id' => 'string|nullable',
        ]);
        // dd($this->student->parent->id,$this);
        PaymentRecord::create([
            'payment_id' => $this->payment_id,
            'date' => $this->date,
            'payment_type' => $this->payment_type,
            'amount' => $this->amount,
            'transaction_id' => $this->reference_id,
            'student_id' => $this->student->id,
            'parent_id' => $this->student->parent->id,

        ]);



        $this->termpaymentrecords = PaymentRecord::where('payment_id', $this->payment_id,)->where('student_id', $this->student->id)->get();

        $this->alert('success', 'added');
    }

    public function subtrac($n, $n2)
    {
        return $n - $n2;
    }


    public function mount($id)
    {
        $this->student = Student::find($id);
        $this->classroomtypes = ClassRoomType::all();
        $this->stu_id = $id;
        $this->yearlog = AcademicYearStudentLog::where('student_id', $id)->get();
    }

    public function createpayment()
    {
        $this->paymentmodal = true;
    }

    public function selectyearfolder($id)
    {
        $this->log_id = $id;
        $aysl = AcademicYearStudentLog::find($id);
        $this->folder = "termfolder";
        $this->termpayments = AcademicTerm::where('academic_year_id', $aysl->academic_year_id)->get();
        $t = AcademicTerm::where('academic_year_id', $aysl->academic_year_id)->get();

        $n = 0;
        $bsum = 0;
        foreach ($t as $i) {
            $i->payment->amount;
            $n += (int)$i->payment->amount;

            foreach ($i->payment->pay_records as $i2) {
                $bsum += $i2->amount;
            }
        }

        $this->yearly_balance = $n - $bsum;
        $this->yearly_total = $n;
        // dd($n);
        // dd($this,$aysl->academic_year_id,$t);
    }

    public function selectpaymentrecordsfolder($id)
    {
        $this->folder = "paymentsrecfolder";
        $this->payment_id = $id;
        $this->termpaymentrecords = PaymentRecord::where('payment_id', $id,)->where('student_id', $this->student->id)->get();
        // dd($this);
    }
    public function back()
    {
        $this->reset(['termpayments', 'is_year_selected', 'folder']);
    }

    public function pdf_invoice()
    {

        return redirect()->route('pdf.invoice_full', ['id' => $this->student->id, 'log_id' => $this->log_id]);
    }

    public function send()
    {
        // dd('helo');
        $token = env('WAPAPITOKEN');
        $to = '265995936887';
        $message = "hello  Elijah the test has worked";

        $data = array(
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $to,
            'type' => 'text',
            'text' => array(
                'preview_url' => true,
                'body' => $message
            ),
        );

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '106785278946098',
            'access_token' => $token,
        ]);


        $whatsapp_cloud_api->sendTextMessage($to, "*HillTOP Accademy Invoice* \nStudent:{$this->student->name} ");
        // $rows = [
        //     new Row('1', '⭐️', "Experience wasn't good enough"),
        //     new Row('2', '⭐⭐️', "Experience could be better"),
        //     new Row('3', '⭐⭐⭐️', "Experience was ok"),
        //     new Row('4', '⭐⭐️⭐⭐', "Experience was good"),
        //     new Row('5', '⭐⭐️⭐⭐⭐️', "Experience was excellent"),
        // ];
        // $sections = [new Section('Stars', $rows)];
        // $action = new Action('Submit', $sections);

        // $whatsapp_cloud_api->sendList(
        //     $to,
        //     'Rate your experience',
        //     'Please consider rating your shopping experience in our website',
        //     'Thanks for your time',
        //     $action

        // );




        // dd($response);
    }

    public function updatedYear()
    {
        $this->alert('success', 'Form changed');

        $this->classes = Classroom::where('classroom_type_id', $this->year)->get();;
        // dd($this);
    }

    public function assignclass($id)
    {
        $this->stu_id = $id;

        $this->assignmodal = true;
        // dd($this);
    }

    public function cancel()
    {
        $this->reset(['class', 'year', 'classes', 'paymentmodal', 'assignmodal', 'stu_id', 'a_year']);
    }

    public function updateclass()
    {
        $this->validate([
            'year' => 'required',
            'class' => 'required',
            'a_year' => 'required'
        ]);

        $stu = Student::find($this->stu_id);

        if ($stu->academic_log_id == "") {

            $aysl = AcademicYearStudentLog::create([
                'student_id' => $this->stu_id,
                'classroom_id' => $this->class,
                'academic_year_id' => $this->a_year,
                'status' => 'current',
            ]);
            // dd($aysl);
            $stu = Student::find($this->stu_id);
            $stu->academic_log_id = $aysl->id;
            $stu->save();
        } else {

            $a = AcademicYearStudentLog::find($stu->academic_log_id);
            $a->classroom_id = $this->class;
            $a->academic_year_id = $this->a_year;
            $a->status = 'current';
            $a->save();
        }







        $this->student = Student::find($this->stu_id);;

        $this->alert('success', 'student logged');

        return redirect()->route('students.show', ['id' => $this->stu_id]);
    }

    public function refresh()
    {
        $this->yearlog = AcademicYearStudentLog::where('student_id', $this->stu_id)->get();
    }

    public function render()
    {
        return view('livewire.students.livewire-student')->with('academicyears', AcademicYear::all());
    }
}
