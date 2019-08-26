<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $language;
    public function __construct(Request $request)
    {
        $this->middleware('guest');


        $prefix = $request->route()->getPrefix();
		if ($prefix != null) {
			Session::put('language', str_replace('/', '', $prefix));
		} else if (!Session::has('language')) {
		}
		$this->language = Session::get('language');
		\App::setLocale(Session::get('language'));
		view()->share('language', $this->language);
		Carbon::setLocale($this->language);
        if (is_null( Session::get('language'))) {
            $this->language = 'es';
        }        
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $idioma = $this->language;
        $idioma = $_POST['idioma'];
        
        // dd($idioma);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if( isset($data["idrutac"]) ){
            $this->redirectTo = $idioma . '/registro/'.$data["idrutac"];
        }else{
            $this->redirectTo = '/'.$idioma;
        }
        return $user;
    }
}
