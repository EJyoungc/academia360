<?php

namespace App\Http\Controllers;

use App\Models\AcademicTerm;
use App\Models\AcademicYearStudentLog;
use App\Models\User;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;

class WapController extends Controller
{
    //
    
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function index(Request $request)
    {
        
        $mode = $request->query('hub_mode');
        $challenge = $request->query('hub_challenge');
        $token = $request->query('hub_verify_token');
        // dd($token,$challenge,$mode);
        Log::info($token);
        Log::info($challenge);
        Log::info($mode);
        if($mode == 'subscribe' &&  $token == 'root' ){
            return response($_GET['hub_challenge'],200);
        }else{
            // return response('',403);
        }
        

        
    }

    public function notify(Request $request){

        Log::info($request->from);
        Log::info($request->msg);
        Log::info($request->number);
        // Log::info($request->msg_status);
        $token = env('WAPAPITOKEN');
        $to = $request->from;
        $message = "Hello Elijah";

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
        if($request->number){
            $whatsapp_cloud_api->sendTextMessage($to, "{$message} ");
        }
        

        return response()->json('working');
    }


    public function pdf($id, $log_id)
    {
        // dd($log_id);
        $st = User::find($id);
        $aysl = AcademicYearStudentLog::find($log_id);
        $current_date = Carbon::now();

        $at = AcademicTerm::where('academic_year_id', $aysl->academic_year_id)->get();
        // Add a new page
        $this->fpdf->AddPage();

        // Set the font and font size
        $this->fpdf->SetFont('Arial', 'B', 16);


        // Logo
        // $this->fpdf->cell(10, 6, 30);
        $this->fpdf->Cell(50, 30, 'Logo', 1, 0, 'C');
        $this->fpdf->Cell(20);
        // $this->fpdf->Cell(50, 30, 'Logo2', 1, 0, 'C');
        // $this->fpdf->Ln(30);
        // $this->fpdf->Cell(50, 30, 'Logo3', 1, 0, 'C');
        // Move to the right
        $this->fpdf->Cell(30);
        // Title
        $this->fpdf->Ln(20);
        $this->fpdf->Cell(80);
        $this->fpdf->Cell(30, 10, 'INVOICE', 0, 0, 'C');
        // Line break
        $this->fpdf->Ln(20);
        $this->fpdf->cell(70);
        // $this->fpdf->Cell(70, 30, 'guardian', 1, 0, 'C');
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(60, 5, 'Invoice No:', 0, 0, 'C');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Cell(60, 5, '3947', 0, 0, '');
        $this->fpdf->Ln(5);
        $this->fpdf->cell(70);
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(60, 5, 'Date:', 0, 0, 'C');
        $this->fpdf->SetFont('Arial', '', 11);
        $this->fpdf->Cell(60, 5, "{$current_date}", 0, 0, '');
        $this->fpdf->Ln(5);
        $this->fpdf->cell(70);
        // $this->fpdf->SetFont('Arial', 'B', 11);
        // $this->fpdf->Cell(60, 5, 'Due Date:', 0, 0, 'C');
        // $this->fpdf->SetFont('Arial', '', 11);
        // $this->fpdf->Cell(60, 5, "{$current_date}", 0, 0, '');



        $this->fpdf->Ln(35);
        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(150, 5, 'Description', 1, 0, 'C');
        $this->fpdf->Cell(40, 5, 'Amount', 1, 0, 'C');
        $this->fpdf->Ln(5);

        $this->fpdf->SetFont('Arial', '', 12);

        $this->fpdf->Cell(150, 5, "{$st->name}  ", 1, 0, 'C');
        $this->fpdf->Cell(40, 5, '', 1, 0, '');
        $this->fpdf->Ln(5);
        $n = 0;
        foreach ($at as $item) {
            $n += (int)$item->payment->amount;

            $this->fpdf->Cell(150, 5, " {$st->academiclog->classroom->crt->name} {$item->name} ", 1, 0, 'C');
            $this->fpdf->Cell(40, 5, "{$item->subtrac($item->payment->amount,$item->payment->total2($item->payment->pay_records))}", 1, 0, '');
            $this->fpdf->Ln(5);
        }

        $this->fpdf->Ln(5);
        // $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', 'b', 12);
        $this->fpdf->cell(110);
        $this->fpdf->Cell(40, 5, 'Amount', 1, 0, '');
        $this->fpdf->Cell(40, 5, "{$n}", 1, 0, '');
        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', '', 11);
        // $this->fpdf->Cell(110, 5, 'All cheques should be written to', 0, 0, '');
        // $this->fpdf->Ln(5);
        // $this->fpdf->Cell(110, 5, 'HILLTOP ACADEMY', 0, 0, '');
        // $this->fpdf->Ln(5);
        // $this->fpdf->Cell(110, 5, 'Standard Bank', 0, 0, '');
        // $this->fpdf->Ln(5);
        // $this->fpdf->Cell(110, 5, 'Limbe Branch', 0, 0, '');
        // $this->fpdf->Ln(5);
        // $this->fpdf->Cell(110, 5, 'Acc #  9100004690998', 0, 0, '');









        // Output the PDF to the browser
        $this->fpdf->Output();
        exit;
    }
}
