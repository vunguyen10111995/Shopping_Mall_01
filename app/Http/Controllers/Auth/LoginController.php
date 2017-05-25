<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Socialite;
use App\Models\Categories;
use App\Models\Product;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $rememeber = $request->input('Remember');
        if (Auth::attempt($auth, $rememeber)) {
            if ((Auth::user()->level) == 1) {
                return redirect('backend');
            } else {
                return redirect('/');
            }
        } else {
            $message = trans('messages.mess');
            return view('auth.login', ['message' => $message]);
        }
    }

    public function logout()
    {
        Auth::logout();
        $category = Categories::category();
        $product = Product::product();

        return view('frontend.index', compact('category', 'product'));
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/get-login');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
 
        return redirect()->to('home');
    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name' => $facebookUser->getName(),
            'email' => $facebookUser->getEmail(),
            'facebook_id' => $facebookUser->getId(),
        ]);
    }
}
