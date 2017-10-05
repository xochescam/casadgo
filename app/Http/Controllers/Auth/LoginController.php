<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/galeria/crear';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(LoginRequest $request){


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $users = User::where('email', '=', $request['email'])->get();

            $redirectRoute = $this->getRedirectRoute((Auth::user()->roles->first()->id));

            return Redirect::to($redirectRoute);
        }

        Session::flash('warning','Los datos son incorrectos.');
        return Redirect::to('/admin');

    }

    /**
     * Logout for users
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {

        if(Auth::user()){

            Auth::logout();
            Session::flush();

            return redirect('/admin');
        }

        return redirect('/galeria/crear');
    }


    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    /**
     * Return corresponding redirect route for each user role.
     *
     * @param string $role
     * @return string
     */
    public function getRedirectRoute($role)
    {

        $routes = [
            1 => '/galeria/crear', //admin
        ];

        return $routes[$role];
    }
}
