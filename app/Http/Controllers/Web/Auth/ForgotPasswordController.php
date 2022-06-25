<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Gwd\SeoMeta\Helper\Seo;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLinkRequestForm()
    {
        return view('web.auth.passwords.email', [
            'seo' => Seo::renderAttributes('Сброс пароля')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $row = User::where('email', $request->email)->first();

        $user['name'] = $row->name;
        $user['token'] =$token;

        Mail::send('email.reset-password', ['user' => $user], function($message) use($request){
            $message->to($request->email);
            $message->subject('Сброс пароля');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
