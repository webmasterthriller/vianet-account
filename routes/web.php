<?php

/*
|--------------------------------------------------------------------------
| Web Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|----------------------------------------------------------------
*/

/*Admin Route Service*/
    // dashboard
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    // operation
    Route::get('/operation', function () {
        return view('admin.operation');
    });

    // new operation
    Route::get('/operation/new', function () {
        return view('admin.operation-new');
    });

    // garant
    Route::get('/garants', function () {
        return view('admin.garant');
    });

    // new add garant
    Route::get('/garant/new', function () {
        return view('admin.add-garant');
    });

/*End Route Service*/


/*Garant Route Service*/
    // dashboard
    Route::get('/garant', function () {
        return view('garant.wallet');
    });

    // offer
    Route::get('/loan', function () {
        return view('garant.loan');
    });

    // new offer
    Route::get('/loan/new', function () {
        return view('garant.loan-new');
    });

    // message
    Route::get('/garant/messenger', function () {
        return view('garant.messenger');
    });

    // new message
    Route::get('/garant/message/new', function () {
        return view('garant.messenger-new');
    });

    // read message
    Route::get('/garant/messenger/read/{message}', function ($message) {
        return view('garant.messenger-read')->with('message',$message);
    });
/*End Garant Route Service*/

/*Client Route Service*/

    // dashboard
    Route::get('/account', function () {
        return view('client.account');
    });

    // account synthesis
    Route::get('/synthesis', function () {
        return view('client.synthesis');
    });

    // add new account
    Route::get('/new/account', function () {
        return view('client.add-account');
    });

    // add new card
    Route::get('/new/card', function () {
        return view('client.add-card');
    });

    // transaction
    Route::get('/transaction', function () {
        return view('client.transaction');
    });

    // transaction history
    Route::get('/transaction/all', function () {
        return view('client.transaction');
    });

    // new transaction
    Route::get('/transaction/new', function () {
        return view('client.transaction-new');
    });

    // messenger
    Route::get('/messenger', function () {
        return view('client.messenger');
    });

    // messenger inbox
    Route::get('/messenger/inbox', function () {
        return view('client.messenger');
    });

    // send new message
    Route::get('/messenger/new', function () {
        return view('client.messenger-new');
    });

    // read message
    Route::get('/messenger/read/{message}', function ($message) {
        return view('client.messenger-read')->with('message',$message);
    });

/*End Client Route Service*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/blank', function () {
    return view('blank');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('role');
