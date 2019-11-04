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
use App\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
// use Auth;

use App\Http\Requests\AdminRegisterMemberRequest;
use App\Http\Requests\ClientNewPasswordRequest;
use App\Http\Requests\ClientProfileUpdateRequest;
use App\Http\Requests\ClientPasswordRequest;
use App\Http\Requests\UpdateClientAccountHistory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['logout']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $billpayCount = Billpay::count();
        $achCount = AchPayment::count();
        $wireCount = WireTransfer::count();

        $transferCount = $billpayCount + $achCount +  $wireCount;
        $userCount = User::count();
        $azaCount = ExternalAccount::count();
        $payeeCount = BillpayAccounts::count();

        $userList = User::orderBy('created_at','desc')->limit(20)->get();
        return view('admin.dashboard', compact('userCount', 'azaCount', 'transferCount', 'payeeCount', 'userList'));
    }

    public function registerMember()
    {
        return view('admin.newmember');
    }

    public function registerMemberForm(AdminRegisterMemberRequest $request)
    {
        $validated = $request->validated();

        $member = new User;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->middle_name = $request->middle_name;
        $member->gender = $request->gender;
        $member->dob = $request->dob;
        $member->home_address = $request->home_address;
        $member->postal_address = $request->postal_address;
        $member->country = $request->country;
        $member->email = $request->email;
        $member->mobile_number = $request->mobile_number;
        $member->occupation = $request->occupation;
        $member->account_type = $request->account_type;
        $member->residency = $request->residency;
        $member->next_of_kin = $request->next_of_kin;
        $member->welcome_message = $request->welcome_message;
        $member->ssn = $request->ssn;
        $member->user_serial_number = str_random(2).time();
        $member->account_number     = date("d")."1".time(); 
        $member->token = rand(134564,723400);

        if ($member->save()) {
            $notification=[
                'message'=>'Account created successfully and will need to be activated',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.register.client')->with($notification);
        } 
        else {
            $notification=[
                'message'=>'something went wrong, try again or contact our customer care representative',
                'alert-type'=>'error'
     
            ];
            return redirect()->back()->route('admin.register.client')->with($notification);

        }
    }

    public function archiveMember()
    {
        $userList = User::orderBy('created_at','desc')->get();
        return view('admin.client', compact('userList'));
    }

    public function archiveMemberInfo($userid)
    {
        $userInfo = User::where('user_serial_number', $userid)->first();
        $history =  transactionHistory::where('user_id', $userInfo->id)->orderBy('created_at','desc')->get();
        return view('admin.clientinfo', compact('userInfo', 'history'));
    }

    public function archiveMemberUpdate($userid)
    {
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();
        return view('admin.clientprofile', compact('userUpdateInfo'));
    }


    public function archiveMemberUpdateProfile(ClientProfileUpdateRequest $request,$userid)
    {
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();

        $userUpdateInfo->first_name = $request['first_name'];
        $userUpdateInfo->last_name = $request['last_name'];
        $userUpdateInfo->middle_name = $request['middle_name'];
        $userUpdateInfo->mobile_number = $request['mobile_number'];
        $userUpdateInfo->dob = $request['dob'];
        $userUpdateInfo->home_address = $request['home_address'];
        $userUpdateInfo->postal_address = $request['postal_address'];
        $userUpdateInfo->country = $request['country'];
        $userUpdateInfo->occupation = $request['occupation'];
        $userUpdateInfo->next_of_kin = $request['next_of_kin'];
        $userUpdateInfo->account_sq = $request['account_sq'];
        $userUpdateInfo->sq_answer = $request['sq_answer'];
        $userUpdateInfo->token = rand(134564,723400);
        $userUpdateInfo->isUpdated = 1;

        if($userUpdateInfo->save()){
            $notification=[
                'message'=>'You have successfully updated client profile!',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }else{
            $notification=[
                'message'=>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type'=>'error'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }
    }


    public function archiveTransactionHistory(UpdateClientAccountHistory $request,$userid)
    {
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();
        $available_amount = $userUpdateInfo->amount;

        $validated = $request->validated();

        $history = new transactionHistory;
        $history->transaction_type = $request->transaction_type;
        $history->transaction_date = $request->transaction_date;
        $history->amount = $request->amount;
        $history->comment = $request->comment;
        $history->user_id = $userUpdateInfo->id;
        $history->transaction_id =  date("m")."1".time(); 
        $history->active_user =  $userUpdateInfo->email;


        // dd($history);
        if($history->transaction_type == 'Debit'){
            $total= $available_amount - $history->amount;
            $history->balance = $total;
            $history->save();

            if($history->save()){
                $userUpdateInfo->amount = $total;
                $userUpdateInfo->save();
            }

            $notification = [
                'message' =>'Debit Payment successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        if ($history->transaction_type == 'Credit'){
            $total= $available_amount + $history->amount;
            $history->balance = $total;
            $history->save();

            if($history->save()){
                $userUpdateInfo->amount = $total;
                $userUpdateInfo->save();
            }
            
            $notification = [
                'message' =>'Credit Payment successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
        else {
        $notification = [
            'message' =>'something went wrong, try again or kindly contact our customer care representative',
            'alert-type' => 'error'
        ];
        return redirect()->back()->with($notification);
    }

    }



    public function archiveAchTransfer()
    {
    $achList = AchPayment::orderBy('created_at','desc')->get();  
    return view('admin.achtransfer',compact('achList'));
    }



    public function archiveWireTransfer()
    {
    $wireList = WireTransfer::orderBy('created_at','desc')->get();  
    return view('admin.wiretransfer',compact('wireList'));
    }


    public function archiveExternalAccount()
    {
    $azaList = ExternalAccount::orderBy('created_at','desc')->get();  
    return view('admin.externalaccount', compact('azaList'));
    }

    public function archiveMessageLog()
    {
    $messageList = Feedback::orderBy('created_at','desc')->get();  
    return view('admin.messagelog', compact('messageList'));
    }


    public function archiveRegisteredPayee() {
    $payeeList = BillpayAccounts::orderBy('created_at','desc')->get(); 
    return view('admin.payee', compact('payeeList'));
    }

    public function archivePayee() {
    $billpayList = Billpay::orderBy('created_at','desc')->get(); 
    return view('admin.billpay', compact('billpayList'));
    }

    public function archiveMemberNewPassword(ClientNewPasswordRequest $request,$userid)
    {
        $validated = $request->validated();
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();

        $userUpdateInfo->password = Hash::make($request['new']);
        $userUpdateInfo->vnv = $request['new'];
        if($userUpdateInfo->save()){
            $notification=[
                'message'=>'You have successfully updated your password. Keep it safe!',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }else{
            $notification=[
                'message'=>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type'=>'error'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }
    }

    public function archiveMemberOldPassword(ClientPasswordRequest $request,$userid)
    {
        $validated = $request->validated();
        $userUpdateInfo = User::where('user_serial_number', $userid)->first();

        $currentPass = $userUpdateInfo->password;

        if(Hash::check($request->old, $currentPass)){
            $userUpdateInfo->password = Hash::make($request->new);
            $userUpdateInfo->vnv = $request['new'];
            $userUpdateInfo->save();

            $notification=[
                'message'=>'Profile Password successfully updated!',
                'alert-type'=>'success'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }else{
            $notification=[
                'message'=>'Invalid Password, try again or kindly contact our customer care representative',
                'alert-type'=>'error'
            ];
            return redirect()->route('admin.member.update', $userid)->with($notification);
        }
    }


    public function settingProfile()
    {
        $setting = Auth::user();
        return view('admin.setting', compact('setting'));
    }


    public function updateBankInfo(Request $request)
    {
        $setting = Auth::user();
        $setting->bank_name = $request->bank_name;
        $setting->bank_phone = $request->bank_phone;
        $setting->bank_email = $request->bank_email;

        if($setting->save()){
            $notification = [
                'message' =>'Website Information updated successfully!',
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

    public function updateBankAddress(Request $request)
    {
        $address = Auth::user();
        $address->bank_address_1 = $request->bank_address_1;
        $address->bank_address_2 = $request->bank_address_2;
        $address->bank_address_3 = $request->bank_address_3;

        if($address->save()){
            $notification = [
                'message' =>'Website Addresses updated successfully!',
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


    public function updateAdminPassword(ClientPasswordRequest $request)
    {
        //
        $admin = Auth::user();
        // $user = User::findOrFail($active_user);
        //validate
        $validated = $request->validated();

        $currentPass = Auth::user()->password;

        if(Hash::check($request->old, $currentPass)){
            $admin->password = Hash::make($request->new);
            $admin->save();
            Auth::guard('admin')->logout();

            $notification=[
                'message'=>'You have successfully updated your password, please login!',
                'alert-type'=>'success'
            ];
            return redirect('/login/admin')->with($notification);
        }else{
            $notification=[
                'message'=>'Invalid current password submitted!',
                'alert-type'=>'error'
            ];
            return redirect()->back()->with($notification);
        }
    }





    // Logout section
    public function adminLogout()
    {
    Auth::guard('admin')->logout();
    $notification=[
        'message'=>'Admin has been logged out!',
        'alert-type'=>'success'
    ];
    return redirect('/login/admin')->with($notification);
    }
}
