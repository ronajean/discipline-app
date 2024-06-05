<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Gmcrequest;
use Illuminate\Support\Facades\Log;

class GmcrequestController extends Controller
{
    //
    public function storeGmcRequest (Request $request)
    {
        $validated = $request->validate([
            //'transaction_no' => 'required|string|max:10',
            'student_no' => 'required|string|max:10',
            'degree_program_id' => 'required|string|max:15',
            'college_id' => 'required|string|max:15',
            'contact_no' => 'required|string|max:15',
            'purpose' => 'required|string|max:4294967295',
            
            
            //'student_signature' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        //$studentSignaturePath = $request->file('student_signature')->store('uploads');

        $transactionNo = Gmcrequest::generateTransactionNo();

        Gmcrequest::create([
            'transaction_no' => $transactionNo,
            'student_no' => $validated['student_no'],
            'degree_program_id' => $validated['degree_program_id'],
            'college_id' => $validated['college_id'],
            'contact_no' => $validated['contact_no'],
            'purpose' => $validated['purpose'],
            
            //'student_signature' => $studentSignaturePath,
        ]);

        return redirect()->route('student.gmc-payment')->with('success', 'GMC request submitted successfully.');

    }

    public function processGmcPayment_Card(Request $request)
    {
        $validated = $request->validate([
            'transaction_no' => 'required|string|max:10',
            'payment_method' => 'nullable|string|max:50',
            'request_status' => 'string|max:255',
            'card_no' => 'nullable|string|max:50',
            'card_expiry' => 'nullable|string|max:50',
            'card_cvv' => 'nullable|string|max:5',
            'reference_no' => 'nullable|string|max:50',
            
            // Add validation rules for other fields you want to update
        ]);

        $updateCount = Gmcrequest::where('transaction_no', $validated['transaction_no'])
                        ->update([
                            'payment_method' => $validated['payment_method'],
                            'card_no' => $validated['card_no'],
                            'card_expiry' => $validated['card_expiry'],
                            'card_cvv' => $validated['card_cvv'],
                            'reference_no' => $validated['reference_no'],
                            'request_status' => $validated['request_status']
                            
                        ]);


        if ($updateCount > 0) {
            // Check if any rows were actually updated
            return redirect()->route('student.gmc-status')->with('success', 'Payment processed successfully.');
        } else {
            // If no rows were updated, handle the case where no record is found
            return redirect()->route('student.gmc-status')->with('error', 'Transaction not found or no update needed.');
        }
    }

    public function processGmcPayment_GCash(Request $request)
    {
        $validated = $request->validate([
            'transaction_no' => 'required|string|max:10',
            'payment_method' => 'nullable|string|max:50',
            'request_status' => 'string|max:255',
            'gcash_receipt' => 'nullable|image|max:102400',
            'reference_no' => 'nullable|string|max:50',
            // Add validation rules for other fields you want to update
        ]);
            Log::info('Validated Data: ', $validated);

            $gcashReceiptData = $request->file('gcash_receipt') ? $request->file('gcash_receipt')->store('uploads') : null;

       
            $updateCount = Gmcrequest::where('transaction_no', $validated['transaction_no'])
                                ->update([
                                    'payment_method' => $validated['payment_method'],
                                    'reference_no' => $validated['reference_no'],
                                    'request_status' => $validated['request_status'],
                                    'gcash_receipt' => $gcashReceiptData,
                                ]);
            
                                

        
            if ($updateCount > 0) {
                return redirect()->route('student.gmc-status')->with('success', 'Payment processed successfully.');
            } else {
                return redirect()->route('student.gmc-status')->with('error', 'Transaction not found or no update needed.');
            }
        
    }

    public function processGmcPayment_OnSite(Request $request)
    {
        $validated = $request->validate([
            'transaction_no' => 'required|string|max:10',
            'payment_method' => 'nullable|string|max:50',
            'request_status' => 'string|max:255',
            'official_receipt_no' => 'nullable|string|max:50',
            // Add validation rules for other fields you want to update
        ]);

        $updateCount = Gmcrequest::where('transaction_no', $validated['transaction_no'])
                        ->update([
                            'payment_method' => $validated['payment_method'],
                            'official_receipt_no' => $validated['official_receipt_no'],
                            'request_status' => $validated['request_status']
                        ]);


        if ($updateCount > 0) {
            // Check if any rows were actually updated
            return redirect()->route('student.gmc-status')->with('success', 'Payment processed successfully.');
        } else {
            // If no rows were updated, handle the case where no record is found
            return redirect()->route('student.gmc-status')->with('error', 'Transaction not found or no update needed.');
        }

        /*$gmcRequest = Gmcrequest::where('transaction_no', $validated['transaction_no'])->get();

        if ($gmcRequest) {
            $gmcRequest->payment_method->update($validated['payment_method']);
            $gmcRequest->official_receipt_no = $validated['official_receipt_no'];
            $gmcRequest->save();

            return redirect()->route('student.gmc-status')->with('success', 'Payment processed successfully.');
        } else {
            // Handle case where no record is found
            return redirect()->route('student.gmc-status')->with('error', 'Transaction not found.');
        }*/

    }

}
