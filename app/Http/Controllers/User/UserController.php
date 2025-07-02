<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\Websitemail;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function login()
    {
        return view('user.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];

        if (Auth::guard('web')->attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'The information you entered is incorrect! Please try again!');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout is successful!');
    }

    public function register()
    {
        return view('user.register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token = hash('sha256', time());
        $user->token = $token;
        $user->save();

        $verification_link = url('register_verify/' . $token . '/' . $request->email);
        $subject = "Registration Verification";
        $message = "To complete registration, please click on the link below:<br>";
        $message .= "<a href='" . $verification_link . "'>Click Here</a>";

        // \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    }

    public function register_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }
        $user->token = '';
        $user->status = 1;
        $user->update();

        return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    }

    public function forget_password()
    {
        return view('user.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email is not found');
        }

        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='" . $reset_link . "'>Click Here</a>";

        // \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');
    }

    public function reset_password($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token or email is not correct');
        }
        return view('user.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user = User::where('email', $request->email)->where('token', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success', 'Password reset is successful. You can login now.');
    }
}
