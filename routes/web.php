<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);
    // Auth::routes();
    // Route::get('/validate/register/success', 'Auth\RegisterController@successRegister');
    
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');


    // Route::view('/', 'welcome');

   // Web Routes

    Route::get('/404', 'SitemapController@Er404')->name('page404');

    Route::get('/', 'SitemapController@welcome')->name('welcome.page');

    Route::get('/about', 'SitemapController@aboutUs')->name('about.page');

    Route::get('/all', 'SitemapController@allshipments')->name('all.page');

    Route::get('/contactus', 'SitemapController@contactus')->name('contactus.page');
    
    Route::get('/quote', 'SitemapController@getaquote')->name('quote.page');




    Route::prefix('administrator')->group(function() {

        Route::group(['middleware'=>'auth:admin'], function () {
    
            Route::group(['namespace' => 'Admin'], function () {
    
                Route::get('/', 'AdminController@index')->name('admin.dashboard');

                //Registered Members
                Route::get('/archive/member', 'AdminController@archiveMember')->name('admin.member');
                Route::get('/archive/member/info/{userid}', 'AdminController@archiveMemberInfo')->name('admin.member.info');
                Route::get('/archive/member/update/{userid}', 'AdminController@archiveMemberUpdate')->name('admin.member.update');
                Route::post('/archive/member/update/profile/{userid}', 'AdminController@archiveMemberUpdateProfile')->name('admin.member.profile.submit');
                //Create New User
                Route::get('/create/member', 'AdminController@registerMember')->name('admin.register.client');
                Route::post('/create/member/submit', 'AdminController@registerMemberForm')->name('admin.register.form');
                //Approve
                Route::get('approve/user/{userid}','ApprovalController@approveClient')->name('admin.client.approved');
                Route::get('suspend/user/{userid}','ApprovalController@suspendClient')->name('admin.client.suspend');
                //ChangeClientPassword
                Route::post('/archive/member/update/submit/{userid}', 'AdminController@archiveMemberNewPassword')->name('admin.member.newpass.submit');
                Route::post('/archive/member/update/old/pass/{userid}', 'AdminController@archiveMemberOldPassword')->name('admin.member.oldpass.submit');
                Route::get('archive/member/delete/{userid}','DeleteController@deleteMember')->name('admin.client.delete');

                
                //Transaction
                Route::post('/archive/transaction/history/submit/{userid}', 'AdminController@archiveTransactionHistory')->name('admin.member.transaction.submit');

                //External Accounts
                Route::get('/archive/transfer/external-account', 'AdminController@archiveExternalAccount')->name('admin.external.account');
                //External Account Operation
                Route::get('approve/external/account/{userid}','ApprovalController@approveAccount')->name('admin.account.approved');
                Route::get('suspend/external/account/{userid}','ApprovalController@suspendAccount')->name('admin.account.suspend');
                Route::get('archive/external/delete/{userid}','DeleteController@deleteExternalAccount')->name('admin.external.delete');




                //PayBills
                Route::get('/archive/paybill/payee', 'AdminController@archiveRegisteredPayee')->name('admin.registered.payee');
                Route::get('/archive/paybill', 'AdminController@archivePayee')->name('admin.payee');
                Route::get('decline/bilpay/{userid}','ApprovalController@suspendBillPay')->name('admin.bilpay.suspend');
                Route::get('archive/payee/delete/{userid}','DeleteController@deletePayee')->name('admin.payee.delete');
                Route::get('archive/billpay/delete/{userid}','DeleteController@deleteBillpay')->name('admin.billpay.delete');



                //Message Logs
                Route::get('/archive/transfer/message-logs', 'AdminController@archiveMessageLog')->name('admin.message.log');
                Route::get('archive/status/closed/{userid}','ApprovalController@markRead')->name('admin.mark.read');
                Route::get('archive/status/open/{userid}','ApprovalController@markUnread')->name('admin.mark.unread');
                Route::get('archive/feedback/delete/{userid}','DeleteController@deleteMsg')->name('admin.msg.delete');

                //New Account
                // Route::get('/create/member', 'AdminController@registerMember')->name('admin.register.client');
                // Route::post('/create/member/submit', 'AdminController@registerMemberForm')->name('admin.register.form');



                //  //Member Operation
                //  Route::get('approve/user/{userid}','ApprovalController@approveClient')->name('admin.client.approved');
                //  Route::get('suspend/user/{userid}','ApprovalController@suspendClient')->name('admin.client.suspend');



                //Wire
                Route::get('/archive/transfer/wire', 'AdminController@archiveWireTransfer')->name('admin.wire.transfer');
                Route::get('decline/wire/transfer/{userid}','ApprovalController@suspendWireTransfer')->name('admin.wire.suspend');
                Route::get('archive/wire/delete/{userid}','DeleteController@deleteWire')->name('admin.wire.delete');



                //ACH
                Route::get('/archive/transfer/ach', 'AdminController@archiveAchTransfer')->name('admin.ach.transfer');
                Route::get('decline/ach/transfer/{userid}','ApprovalController@suspendAchTransfer')->name('admin.ach.suspend');
                Route::get('archive/ach/delete/{userid}','DeleteController@deleteAch')->name('admin.ach.delete');



                //Settings
                Route::get('archive/setting/profile','AdminController@settingProfile')->name('admin.settings.profile');
                Route::post('archive/setting/bank/info','AdminController@updateBankInfo')->name('admin.bank.info');
                Route::post('archive/setting/bank/address','AdminController@updateBankAddress')->name('admin.bank.address');
                Route::post('archive/setting/password/update','AdminController@updateAdminPassword')->name('admin.password.update');




                //Logout
                Route::post('/logout', 'AdminController@adminLogout')->name('admin.logout');


            });
    
        });

   });
