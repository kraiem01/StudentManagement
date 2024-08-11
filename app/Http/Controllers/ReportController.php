<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App;
use Auth;


class ReportController extends Controller
{
   public function Report1($pid){ 
   $payment = Payment::find($pid); 
   $pdf= App::make('dompdf.wrapper');
   $print= "<div style='margin:20px; padding:20px;'>";
   $print.= "<h1 align='centre'>Payment Recipt</h1>";
   $print.= "<hr/>";
   $print.= "<p>Recipt No : <b>" . $pid . "</b></p>";
   $print.= "<p> Date : <b>" . $payment->paid_date . "</b></p>";
   $print.= "<p>Enrollment No : <b>" . $payment->enrollment->enroll_no . "</b></p>";
   $print.= "<p>Student Name : <b>" . $payment->enrollment->student->name . "</b></p>";

   $print.= "<hr/>";

   $print.= "<table style='with: 100%;'>";
   $print.= "<tr>";
   $print.= "<td>Batch<td/>";
   $print.= "<td>Amount<td/>";
   $print.= "<tr/>";

   $print.= "<tr>";
   $print.= "<td>". $payment->enrollment->batch->name ."<td/>";
   $print.= "<td>". $payment->amount ."<td/>";
   $print.= "<tr/>";

   $print.= "<table/>";
   
   $print.= "<hr/>";

   $print.= "<span>Printed Date : <b>" . date('Y-m-d') ."</b> </span>";
   $print.= "<div/>";

   $pdf->loadHtml($print);
   return $pdf->stream();
}

}
?>