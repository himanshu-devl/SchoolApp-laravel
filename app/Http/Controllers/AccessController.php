<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendRegistrationEmailJob;

class AccessController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Use Eloquent to fetch the user based on the provided credentials
        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            // If the user is found, store user data in the session
            session(['user_id' => $user->id]);
            session(['username' => $user->username]);
            session(['role' => $user->role]);

            return redirect()->route('dashboard');
        } else {
            // Handle login failure
            return redirect()->back()->with('login_error', 'Invalid credentials. Please try again.');
        }
    }


    public function register(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password =bcrypt($request->input('password'));
        $role = $request->input('role');

        // Create a new User instance using Eloquent model
        $user = new User([
            'username' => $username,
            'email'  => $email,
            'password' => $password,
            'role' => $role,
        ]);

        if ($user->save())
        {

            if ($role === 'student') {

                $studentName = $request->input('name');
                $student = new Student([
                    'name' => $username,

                ]);
                $student->save();
            }
            SendRegistrationEmailJob::dispatch($user);
            return redirect()->route('index')->with('registration_success', true);
        } else {
            return back()->with('registration_error', 'Error: Unable to register user.');
        }
    }


    public function logout()
    {
        // Clear the session data
        session()->forget(['user_id', 'username', 'role']);

        // Or, you can use the flush method to clear all session data:
        // session()->flush();

        return redirect()->route('index')->with('logout_success', true);
    }

}
