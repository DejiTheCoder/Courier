<?php

namespace App\Http\Controllers\Admin;

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
// use Auth;

use App\Http\Requests\AdminRegisterMemberRequest;
use App\Http\Requests\ClientNewPasswordRequest;
use App\Http\Requests\ClientProfileUpdateRequest;
use App\Http\Requests\ClientPasswordRequest;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approveClient($userid){
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();
        $userUpdateInfo->isVerified = 1;
        if($userUpdateInfo->save()){
            $notification = [
                'message' =>'Account successfully approved!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' =>'something went wrong, try again or kindly contact our customer care representative',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    public function suspendClient($userid){
            $userUpdateInfo = User::where('user_serial_number', $userid)->first();
            $userUpdateInfo->isVerified = 2;
            $newPassword = 12345610;
            $userUpdateInfo->password = Hash::make($newPassword);
            $userUpdateInfo->vnv = $newPassword;

            if($userUpdateInfo->save()){
                $notification = [
                    'message' =>'Account suspended successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }

    public function approveAccount($userid){

        $approveAza = ExternalAccount::where('bank_account_number', $userid)->first();

        $approveAza->isVerified = 1;
        if($approveAza->save()){
            $notification = [
                'message' =>'External Account successfully Linked!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        $notification = [
            'message' =>'something went wrong, try again or kindly contact our customer care representative',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    public function suspendAccount($userid){

        $approveAza = ExternalAccount::where('bank_account_number', $userid)->first();
            $approveAza->isVerified = 0;

            if($approveAza->save()){
                $notification = [
                    'message' =>'External Account suspended successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }


    public function suspendWireTransfer($userid){

        $wireTrans = WireTransfer::where('transaction_id', $userid)->first();
            $wireTrans->isVerified = 2;

            if($wireTrans->save()){
                $notification = [
                    'message' =>'Wire Payment declined successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }

    public function suspendAchTransfer($userid){

        $ach = AchPayment::where('transaction_id', $userid)->first();
            $ach->isVerified = 2;

            if($ach->save()){
                $notification = [
                    'message' =>'ACH Payment declined successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }


    public function suspendBillPay($userid){

        $bill = Billpay::where('pay_transaction_id', $userid)->first();
            $bill->pay_approve_status = 2;

            if($bill->save()){
                $notification = [
                    'message' =>'Billpay Payment declined successfully!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }


    public function markRead($userid){

        $msg = Feedback::where('id', $userid)->first();
            $msg->isRead = 1;

            if($msg->save()){
                $notification = [
                    'message' =>'Enquiry message is now closed!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }

    public function markUnread($userid){

        $msg = Feedback::where('id', $userid)->first();
            $msg->isRead = 0;

            if($msg->save()){
                $notification = [
                    'message' =>'Enquiry message is now open!',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            }
            $notification = [
                'message' =>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
    }
        
        
}
