<?php

use LdapRecord\Models\OpenLDAP\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/geteinstein', function () {

    $user = User::find('uid=einstein,dc=example,dc=com');

    dd($user);

    return view('welcome');
});

Route::get('logineinstein', function () {
    $connection = new \LdapRecord\Connection(['hosts' => ['ldap.forumsys.com']]);

    $password = 'password';

    $response = $connection->auth()->attempt('uid=einstein,dc=example,dc=com', $password);

    dd($response);
});