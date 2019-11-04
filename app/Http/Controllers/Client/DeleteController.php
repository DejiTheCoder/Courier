<?php

namespace App\Http\Controllers\Client;

use App\ExternalAccount;
use App\BillpayAccounts;
use App\Billpay;
use App\Paperless;
use App\Feedback;
use App\AchPayment;
use App\WireTransfer;
use App\transactionHistory;
use App\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



use App\Http\Requests\EnrolAccount;
use App\Http\Requests\BillpayAza;
use App\Http\Requests\BillpayRequest;
use App\Http\Requests\PaperlessRequest;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\AchPaymentRequest;
use App\Http\Requests\WireTransferRequest;
use App\Http\Requests\AccountHistoryRequest;
use App\Http\Requests\ClientPasswordRequest;
use App\Http\Requests\ClientProfileUpdateRequest;
use Illuminate\Http\Request;



class DeleteController extends Controller
{

    public function deletePayee($id){
        $payee = BillpayAccounts::findOrFail($id);
        if($payee->delete()){
            $notification=[
                'message'=>'Payee deleted successfully',
                'alert-type'=>'success'
            ];
            return redirect()->back()->with($notification);
        }

        $notification=[
            'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    public function deleteExternalAccount($id){
        $exAza = ExternalAccount::findOrFail($id);
        if($exAza->delete()){
            $notification=[
                'message'=>'External Account deleted successfully',
                'alert-type'=>'success'
            ];
            return redirect()->back()->with($notification);
        }

        $notification=[
            'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }
    
}
