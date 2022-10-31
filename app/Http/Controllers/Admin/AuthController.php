<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{

    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    protected $redirectTo = '/admin';

    /**
     * @var bool
     */
    protected $canBeAdded = false;
    /**
     * @var string
     */
    protected $redirectToSignIn = "/admin/auth/signin";


    public function signin()
    {
        $this->setTitle('Вход в систему');

        return view('admin.auth.login', $this->getData());
    }

    /**
     * @return string
     */
    public function redirectPath(): string
    {

        if (isset($_GET['return'])) {
            return $_GET['return'];
        }
        return $this->redirectTo;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->guard()->logout();
        return redirect($this->redirectToSignIn);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    protected function validateLogin(Request $request): void
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $attempt = $this->guard()->attempt(
            array_merge($this->credentials($request), ['deleted_at' => null]), $request->filled('remember')
        );
        return $attempt;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function authenticated()
    {
    }

}
