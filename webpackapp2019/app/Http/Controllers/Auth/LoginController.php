<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use URL;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

/////
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
    //print_r($_GET);

    
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $language;
    
    public function __construct(Request $request)
    {
        // $this->middleware('guest')->except('logout');
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

    protected function authenticated(Request $request, $user)
    {
        // $idioma = $this->language;
        $idioma = $_POST['idioma'];
        
        // dd($idioma);
        // dd('yata');
        if(isset($_POST["idrutac"])){
            return redirect($idioma . '/registro/'.$_POST["idrutac"]);
        }
        else{
            
            return redirect($idioma . '/user/reservas');
        }
    }

    public function logout(Request $request)
    {
        // $idioma = $this->language;

        // dd($idioma);
        $idioma = $request->idioma;
        
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/' . $idioma);
    }

    public function redirectToProvider($provider)
    {
        // dd('yata');
        if(isset($_GET['id'])){
            session()->flash('resera_key', $_GET['id']);
        }
        if(isset($_GET['idioma'])){
             session()->flash('idioma_data', $_GET['idioma']);
        }
        return Socialite::driver($provider)->redirect();

        // $facebookFields = [
        //     'first_name', // Default
        //     'last_name', // Default
        //     'name', // Default
        //     'email', // Default
        //     'gender'
        // ];
        // return Socialite::driver($provider)->fields($facebookFields)->scopes([
        //     'email'
        // ])->redirect();
    }

    public function handleProviderCallback($provider)
    {
        // $idioma = $_POST['idioma'];
        // dd('yata');
        $idioma = session('idioma_data');
        if(isset($_GET["error"])  and $_GET["error"]=="access_denied"){
            //dd("cancelada");
            $id = session('resera_key');
            if($id == ""){
                return redirect($idioma.'/login');
            }
            else{
                session()->forget('resera_key');
                return redirect($idioma.'/registro/'.$id);
            }
        }
        else{
            //dd($provider);
            try
             {
                 if($provider == 'facebook'){
                      $socialUser = Socialite::driver($provider)->fields([
                     'first_name', 'last_name', 'email', 'gender', 'birthday'
                      ])->user();
                 }else{
                     $socialUser = Socialite::driver($provider)->user(); 
                 }
             }
             catch(\Exception $e)
             {
                 dd($e);
                 return redirect('/');
             }
              
             //dd($socialUser);
             //check if we have logged provider
             $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
             if(!$socialProvider)
             {
                 
                 //create a new user and provider
                 if($provider == 'facebook'){
                    if(isset($socialUser->user['email'])){
                        $email = $socialUser->user['email'];
                    }
                    else{
                        $email = date("Y-m-d H:i:s");
                    }
                     $user = User::firstOrCreate(
                         ['email' => $email],
                         ['name' => $socialUser->user['first_name']],
                         ['lastname' => $socialUser->user['last_name']],
                         ['photo' => $socialUser->getAvatar()]
                     );

                     $user->lastname = $socialUser->user['last_name'];
                     $user->photo = $socialUser->getAvatar();
                     $user->save();
                 }else{
                     $user = User::firstOrCreate(
                         ['email' => $socialUser->getEmail()],
                         ['name' => $socialUser->getName()]
                     );
                 }

                 $user->socialProviders()->create(
                     ['provider_id' => $socialUser->getId(), 'provider' => $provider]
                 );
             }
             else
                $user = $socialProvider->user;
                auth()->login($user);
             
             if(session('resera_key')){
                 $id = session('resera_key');
                 session()->forget('resera_key');
                 return redirect($idioma.'/registro/'.$id);
             }else{
                 return redirect($idioma .'/user/reservas');
             }
        }
     }
}
