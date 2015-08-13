<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {

    return view('welcome');
});

Route::get('taiere/{nombre}',function($nombre){
    $redirect = redirect()->route('profile');
    return $redirect;
   // return '<h1>Hola Taiere'.' '. $nombre .' '.$id . '</h1>';

});

Route::get('user/profile', ['as' => 'profile', function () {
    return '<h1>Hola profile</h1>';
}]);

Route::get('hola/{nombre}/{avatar}', /**
 * @return \Illuminate\View\View
 */
    function($nombre,$avatar='hi'){


    return view ('greeting',['name'=> $nombre, 'avatar'=> $avatar]);

});

Route::get('hola2', /**
 * @return \Illuminate\View\View
 */
    function(){

        $view = view('greeting')->withNombre('Pulenta');

        return $view;

    });
Route::get('blade', function(){
    return view('layouts.child');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('home', function () {

    return view('welcome');
});

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('login/{provider?}', 'Auth\AuthController@login');

/*
Route::get('login/Facebook?', function ($facebook = "facebook")
{
    // Get the provider instance
    $provider = \Laravel\Socialite\Facades\Socialite::with($facebook);

    // Check, if the user authorised previously.
    // If so, get the User instance with all data,
    // else redirect to the provider auth screen.
    if (Input::has('code'))
    {
        $user = $provider->user();

        return var_dump($user);
    } else {
        return $provider->redirect();
    }
});
*/