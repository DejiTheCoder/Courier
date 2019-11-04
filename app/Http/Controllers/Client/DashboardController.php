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



class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active_user = Auth::user()->id;
        $externalAza = ExternalAccount::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();
        $transaction = transactionHistory::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();
        return view('clients.dashboard', compact('transaction', 'externalAza'));
    }

    public function advanceHistory()
    {
        $active_user = Auth::user()->id;
        $transaction = transactionHistory::where(['id'=>$active_user])->orderBy('created_at','desc')->paginate(30);
        return view('clients.history', compact('transaction'));
    }

    public function searchHistory(AccountHistoryRequest $request)
    {
        $validated = $request->validated();

        $active_user = Auth::user()->id;
        $start_date = date($request->transaction_start_date);
        $end_date = date($request->transaction_end_date);
        $transaction = transactionHistory::where(['id'=>$active_user])
        ->where('transaction_date','>=',$start_date)->where('transaction_date','<=',$end_date)->orderBy('created_at','desc')->paginate(30);
        return view('clients.advancehistory', compact('transaction'));
    }

    public function contact()
    {
        return view('clients.contact');
    }

    public function mobileDeposit()
    {
        return view('clients.md');
    }

    public function feedback(FeedbackRequest $request)
    {
         //validate
         $validated = $request->validated();
 
         $feedback = new Feedback;
         $feedback->department = $request->department;
         $feedback->subject = $request->subject;
         $feedback->client_name = $request->client_name;
         $feedback->client_email = $request->client_email;
         $feedback->client_complaints = $request->client_complaints;
        //  $feedback->user_id = Auth::user()->id;
         $feedback->active_user = Auth::user()->email;
         $feedback->user()->associate($request->user());        


         if($feedback->save()){
            $notification=[
                   'message'=>'Message sent successfully and ticket activated. A customer care representative will be in touch',
                   'alert-type'=>'success'
               ];
    
           return redirect()->route('contact.dashboard')->with($notification);
           }
           else{
    
           $notification=[
               'message'=>'something went wrong, try again or contact webmaster',
               'alert-type'=>'error'
    
           ];
           return redirect()->back()->route('contact.dashboard')->with($notification);
           }
 

    }

    public function paperless()
    {
        $active_user = Auth::user()->email;
        $paperless = Paperless::where(['active_user'=>$active_user])->orderBy('created_at','desc')->first();
        // dd($paperless);
        return view('clients.paperless', compact('paperless'));
    }

    public function setNotification(PaperlessRequest $request)
    {
        //validate
        $validated = $request->validated();

        $active_user = Auth::user()->email;
        $settings = Paperless::where(['active_user'=>$active_user])->first();

        $paperless = new Paperless;
        $paperless->general_statement = $request->general_statement;
        $paperless->tax_statement = $request->tax_statement;
        $paperless->notification = $request->notification;

        $paperless->active_user = Auth::user()->email;

        // dd($paperless);
        if($paperless->save()){
            $notification=[
                   'message'=>'Your settings have been successfully applied.',
                   'alert-type'=>'success'
               ];
    
           return redirect()->route('paperless.dashboard')->with($notification);
           }
           else{
    
           $notification=[
               'message'=>'something went wrong, Your settings haven\'t been successfully applied. try again or contact webmaster',
               'alert-type'=>'error'
    
           ];
           return redirect()->back()->route('paperless.dashboard')->with($notification);
           }
        
        // return view('clients.paperless');
    }

    public function goals()
    {
        return view('clients.goals');
    }

    public function rewards()
    {
        return view('clients.rewards');
    }

    public function payee()
    {
        
        $active_user = Auth::user()->id;
        $payeeAza = BillpayAccounts::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();        
        return view('clients.payee', compact('payeeAza'));
    }

    public function enrolPayeeAccount(BillpayAza $request)
    { 
        
        //validate
        $validated = $request->validated();

        $enrolPayee = new BillpayAccounts;
        $enrolPayee->pay_account_name = $request->pay_account_name;
        $enrolPayee->pay_nickname = $request->pay_nickname;
        $enrolPayee->pay_account_address = $request->pay_account_address;
        $enrolPayee->pay_city_state_zip = $request->pay_city_state_zip;
        $enrolPayee->pay_account_number = $request->pay_account_number;
        $enrolPayee->pay_account_phone = $request->pay_account_phone;

        $enrolPayee->user()->associate($request->user());        
        $enrolPayee->active_user = Auth::user()->email;

        // dd($enrolPayee);

        if($enrolPayee->save()){

            $notification=[
                   'message'=>'Payee successfully added!',
                   'alert-type'=>'success'
               ];
    
           return redirect()->route('payee.dashboard')->with($notification);
           }
           else{
    
           $notification=[
               'message'=>'something went wrong, try again or contact webmaster',
               'alert-type'=>'error'
    
           ];
           return redirect()->back()->route('payee.dashboard')->with($notification);
           }
    }

    public function billpay()
    { 
        $active_user = Auth::user()->id;
        $payeeAza = BillpayAccounts::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();    
        $billpay = Billpay::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();    
        return view('clients.billpay', compact('payeeAza','billpay'));
    }

    public function payBillpay(BillpayRequest $request)
    { 
        $validated = $request->validated();

        $billpay = new Billpay;
        $billpay->pay_source_account = $request->pay_source_account;
        $billpay->pay_destination_account = $request->pay_destination_account;
        $billpay->pay_amount = $request->pay_amount;
        $billpay->pay_date_transaction = $request->pay_date_transaction;
        
        $billpay->user()->associate($request->user());

        $billpay->active_user = Auth::user()->email;
        $billpay->pay_transaction_id = date("m")."1".time(); 

        // dd($billpay);

        if($billpay->save()){

            $notification=[
                   'message'=>'Your request was sent successfully',
                   'alert-type'=>'success'
               ];
    
           return redirect()->route('billpay.dashboard')->with($notification);
           }
           else{
    
           $notification=[
               'message'=>'something went wrong, try again or contact support department',
               'alert-type'=>'error'
    
           ];
           return redirect()->back()->route('billpay.dashboard')->with($notification);
           }
    }

    public function externalAccount()
    {
        $active_user = Auth::user()->id;
        $externalAza = ExternalAccount::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();
        return view('clients.external', compact('externalAza'));
    }

    public function enrolAccount(EnrolAccount $request)
    {
         //validate
        $validated = $request->validated();

        $enrolExternal = new ExternalAccount;
        $enrolExternal->bank_name = $request->bank_name;
        $enrolExternal->bank_account_number = $request->bank_account_number;
        $enrolExternal->bank_routing_number = $request->bank_routing_number;
        $enrolExternal->bank_nickname = $request->bank_nickname;
        $enrolExternal->bank_account_type = $request->bank_account_type;

        $enrolExternal->user()->associate($request->user());

        // $enrolExternal->regNo  = date("d")."1".time(); 

        if($enrolExternal->save()){

        $notification=[
               'message'=>'External Account was sent successfully. You will be notified when approved',
               'alert-type'=>'success'
           ];

       return redirect()->route('external.dashboard')->with($notification);
       }
       else{

       $notification=[
           'message'=>'something went wrong, try again or contact webmaster',
           'alert-type'=>'error'

       ];
       return redirect()->back()->route('external.dashboard')->with($notification);
       }

    }

    public function ach()
    {
        $active_user = Auth::user()->id;
        $externalAza = ExternalAccount::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();        
        $achPayment = AchPayment::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();        
        return view('clients.ach', compact('externalAza', 'achPayment'));
    }

    public function achTransfer(AchPaymentRequest $request)
    {
         //validate
        $validated = $request->validated();

        $ach = new AchPayment;
        $ach->sender_account = $request->sender_account;
        $ach->receiver_account = $request->receiver_account;
        $ach->transfer_type = $request->transfer_type;
        $ach->amount = $request->amount;
        $ach->schedule_date_transaction = $request->schedule_date_transaction;

        $ach->user()->associate($request->user());
        $ach->transaction_id  = date("d")."1".time(); 
        $ach->active_user = Auth::user()->email;

        if($ach->save()){

        $notification=[
               'message'=>'Transfer request was sent successfully and will be approved within 2-3 business days',
               'alert-type'=>'success'
           ];

       return redirect()->route('ach.dashboard')->with($notification);
       }
       else{

       $notification=[
           'message'=>'something went wrong, try again or contact webmaster',
           'alert-type'=>'error'

       ];
       return redirect()->back()->route('ach.dashboard')->with($notification);
       }

    }

    public function wireTransfer()
    {
        $active_user = Auth::user()->id;
        $wiretrans = WireTransfer::where(['user_id'=>$active_user])->orderBy('created_at','desc')->get();        
        return view('clients.wire',compact('wiretrans'));
    }

    public function wirePayment(WireTransferRequest $request)
    {
         //validate
        $validated = $request->validated();

        $wire = new WireTransfer;
        $wire->beneficiary_country = $request->beneficiary_country;
        $wire->beneficiary_bank = $request->beneficiary_bank;
        $wire->beneficiary_bank_address = $request->beneficiary_bank_address;
        $wire->beneficiary_account_number = $request->beneficiary_account_number;
        $wire->beneficiary_routing_number = $request->beneficiary_routing_number;
        $wire->beneficiary_sort_code = $request->beneficiary_sort_code;
        $wire->beneficiary_swift_code = $request->beneficiary_swift_code;
        $wire->beneficiary_name = $request->beneficiary_name;
        $wire->beneficiary_address = $request->beneficiary_address;
        $wire->pay_amount = $request->pay_amount;
        $wire->active_user = Auth::user()->email;

        $wire->transaction_id  = date("d")."1".time(); 



        $wire->user()->associate($request->user());
        if($wire->save()){

        $notification=[
               'message'=>'Transfer sent successfully. You will be notified when approved',
               'alert-type'=>'success'
           ];

       return redirect()->route('wire.dashboard')->with($notification);
       }
       else{

       $notification=[
           'message'=>'something went wrong, try again or contact webmaster',
           'alert-type'=>'error'

       ];
       return redirect()->back()->route('wire.dashboard')->with($notification);
       }

    }

    public function profileSettings()
    {
        return view('clients.settings');
    }

    public function changePass(ClientPasswordRequest $request)
    {
        //
        $active_user = Auth::user()->id;
        $user = User::findOrFail($active_user);

        //validate
        $validated = $request->validated();

        $currentPass = Auth::user()->password;

        if(Hash::check($request->old, $currentPass)){
            $user->password = Hash::make($request->new);
            $user->save();
            Auth::logout();

            $notification=[
                'message'=>'You have successfully updated your password, please login!',
                'alert-type'=>'success'
            ];
            return redirect()->route('login')->with($notification);
        }else{
            $notification=[
                'message'=>'Invalid current password submitted!',
                'alert-type'=>'error'
            ];
            return redirect()->route('setting.dashboard')->with($notification);
        }
    }

    public function updateAccountInfo(ClientProfileUpdateRequest $request)
    {
        //validate
        $validated = $request->validated();

        $active_user = Auth::user()->id;
        $user = User::findOrFail($active_user);

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->middle_name = $request['middle_name'];
        $user->mobile_number = $request['mobile_number'];
        $user->home_address = $request['home_address'];
        $user->postal_address = $request['postal_address'];
        $user->country = $request['country'];
        $user->occupation = $request['occupation'];
        $user->next_of_kin = $request['next_of_kin'];
        $user->welcome_message = $request['welcome_message'];

        if($user->save ()){
            $notification=[
                'message'=>'You have successfully updated your account information!',
                'alert-type'=>'success'
            ];
            return redirect()->route('setting.dashboard')->with($notification);
        }else{
            $notification=[
                'message'=>'something went wrong, try again or kindly contact our customer care representative',
                'alert-type'=>'error'
            ];
            return redirect()->route('setting.dashboard')->with($notification);
        }

        
    }

    
}
