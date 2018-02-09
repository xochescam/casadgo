<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\ChangePassRequest;

use App\User;
use Session;
use Auth;
use Hash;
use Redirect;
use Gate;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Gate::denies('change.pass')) {
            abort(403);
        }

        $user = User::findOrFail($id);

        return view('admin.change-pass');
    }


    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangePassRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()) {
            $user = Auth::user();

            if (Hash::check($request->input('current_pass'), $user->password)) {

                if ($request->input('new_pass') == $request->input('confirm_new_pass')) {
                    $user->password = bcrypt($request->input('new_pass'));
                    $user->save();

                    Session::flash('message','Contraseña modificada correctamente.');
                    return back();
                }

            } else {
                Session::flash('warning','La contraseña actual es incorrecta.');
                return back();
            }
        }

        return Redirect::to('/admin');
    }
}
