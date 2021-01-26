<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SMSCode;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone_number';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|min:11|max:11',
        ]);
    }

    public function requestCode(Request $request)
    {

        $this->validate($request, [
            'phone_number' => 'required|string|min:11|max:11',
            'privacy' => 'accepted'
        ]);

        // check if user exists
        $user = User::firstOrCreate([
            'phone_number' => $request->phone_number
        ], [
            'phone_number' => $request->phone_number,
            'role_id' => 2,
        ]);

        // check if the user has a recent sms sent
        $smsCode = SMSCode::latest()->where('user_id', $user->id)->first();
        if ($smsCode) {
            $date = Carbon::parse($smsCode->created_at);
            $now = Carbon::now();
            $diff = $date->diffInMinutes($now);
            if ($diff < env('SMS_RESEND_MINUTES')) {
                Toastr::error('message', 'لطفا دقایقی تا ارسال کد مجدد صبر کنید');
                // return $e->getMessage();
                return redirect()->route('login');
            }
        }

        // send the code
        try {
            // create a new code
            $theCode = generateCode();
            sendSMSPatternLogin($request->phone_number, $theCode);
            SMSCode::create([
                'user_id' =>  $user->id,
                'code' =>  $theCode,
            ]);
            Session::put('phone_number', $request->phone_number);
        } catch (\Exception $e) {

            Toastr::error('message', 'مشکلی در ارسال پیام کوتاه وجود دارد. لطفا دوباره تلاش کنید');
            // return $e->getMessage();
            return redirect()->route('login');
        }

        Toastr::success('message', 'عملیات با موفقیت انجام شد');
        return redirect()->route('verify');
    }

    public function checkAndAuthenticate(Request $request): string
    {
        $this->validate($request, [
            'code' => 'required|string',
        ]);

        $phone_number = Session::get('phone_number');
        if (!$phone_number) {
            Toastr::error('message', 'دسترسی به این صفحه قبل از فرستاده کد امکان پزیر نیست');
            return redirect()->back();
        }

        // get the code generated
        $smsCode = SMSCode::where(['code' => $request->code])
            ->WhereHas('user', function ($query) use ($phone_number) {
                $query->where('phone_number', $phone_number);
            })->first();

        if ($smsCode) {
            $date = Carbon::parse($smsCode->created_at);
            $now = Carbon::now();
            $diff = $date->diffInMinutes($now);
            if ($diff < env('SMS_RESEND_MINUTES')) {


                $user = $smsCode->user;

                // Session::forget('phone_number');
                Auth::login($user);
                Toastr::success('message', 'خوش آمدید');

                if ($response = $this->authenticated($request, $this->guard()->user())) {
                    return $response;
                }

                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
            }
        }

        Session::forget('phone_number', $request->phone_number);
        Toastr::error('message', 'کد وارد شده معتبر نیست. لطفا دوباره تلاش کنید');
        return redirect()->route('login');
    }

    public function showVerifyForm(Request $request)
    {
        $phone_number = Session::get('phone_number');
        if (!$phone_number) {
            Toastr::error('message', 'دسترسی به این صفحه قبل از فرستاده کد امکان پذیر نیست');
            return redirect()->back();
        }
        return view('auth.verify');
    }


    protected function authenticated($request, $user)
    {
        if ($user->hasRole('Admin')) {

            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('User')) {

            return redirect()->route('user.dashboard');
        }
    }
}
