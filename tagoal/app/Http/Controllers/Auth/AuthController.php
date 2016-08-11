<?php

namespace App\Http\Controllers\Auth;

use App\Tagoal\Users\User;
use App\Tagoal\Mailers\AppMailer;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

        /**
     * Overriding from E:\Wamp\wamp\www\tagoal\vendor\laravel\framework\src\Illuminate\Foundation\Auth\RegistersUsers
     */
    public function postRegister(Request $request, AppMailer $mailer)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        // $user = $this->create($request->all());

        // $mailer -> sendEmailConfirmationTo($user);

        // return 1;

        \Auth::login($this->create($request->all()));

        return redirect($this->redirectPath());
    }


    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        dd('You are now confirmed. Please login.');
        return redirect('login');
    }

}
