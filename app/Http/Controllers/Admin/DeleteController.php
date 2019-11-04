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

class DeleteController extends Controller
{
    public function deleteMsg($id){
        $msg = Feedback::findOrFail($id);
        if($msg->delete()){
            $notification=[
                'message'=>'Entry message deleted successfully',
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

    public function deleteBillpay($id){
        $billpay = Billpay::findOrFail($id);
        if($billpay->delete()){
            $notification=[
                'message'=>'Billpay payment deleted successfully',
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

    public function deleteAch($id){
        $ach = AchPayment::findOrFail($id);
        if($ach->delete()){
            $notification=[
                'message'=>'Ach Payment deleted successfully',
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

    public function deleteWire($id){
        $wire = WireTransfer::findOrFail($id);
        if($wire->delete()){
            $notification=[
                'message'=>'Wire Payment deleted successfully',
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

    public function deleteMember($id){
        $user = User::findOrFail($id);
        if($user->delete()){
            $notification=[
                'message'=>'User deleted successfully',
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
