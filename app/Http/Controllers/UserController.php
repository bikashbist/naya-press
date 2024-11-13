<?php

namespace App\Http\Controllers;

use App\Model\Dcms\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $user = null;
    protected $userInfo = null;
    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function submitUser(Request $request)
    {

        $rules = array(
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin'
        );
        $request->validate($rules);

        $data = $request->all();
        $data['email_token'] = \Str::random(100);
        $data['status'] = 'unverified';
        $data['password'] = Hash::make($data['password']);

        $this->user->fill($data);
        $status = $this->user->save();
        if ($status) {
            $request->session()->flash('status', 'Thank you for the registration. Your account has been created. Please Login for further processing.');
            // email
            // route('activate', [$this->>user->id, $this->user->email_token])
            return redirect()->route('login');
        } else {
            $request->session()->flash('error', 'Sorry! Your account could not be created at this time. Please contact our administration.');
            return redirect()->route('user-register');
        }
    }

    public function activateUser(Request $request)
    {
        // user_id, token
    }

    public function registerUser(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            // 'role_super' => 'required|in:1,0',
        ];

        $request->validate($rules);

        // Collecting and preparing data
        $data = $request->all();
        $data['status'] = 1 ; // Assuming you're using this for email verification
        $data['password'] = Hash::make($data['password']);
        $data['role_super'] = 0;

        // Saving the user
        $user = new User(); 
        $user->fill($data);
        $user->save();

        // Return success or redirect
        return redirect()->back()->with('success', 'Registration successful! Please verify your email.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,user'
        ]);
        if (User::where('email', $request->email)->first()) {
            return response([
                'message' => 'Email already exists',
                'status' => 'failed'
            ], 200);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tc' => json_decode($request->tc),
            'role' => $request->role
        ]);
        $token = $user->createToken($request->email)->plainTextToken;
        return response([
            'token' => $token,
            'message' => 'Registration Success',
            'status' => 'success'
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
            $role = $user->role;
            return response([
                'token' => $token,
                'role' => $role,
                'message' => 'Login Success',
                'status' => 'success'
            ], 200);
        }
        return response([
            'message' => 'The Provided Credentials are incorrect',
            'status' => 'failed'
        ], 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success',
            'status' => 'success'
        ], 200);
    }
    public function logged_user()
    {
        $loggeduser = auth()->user();
        return response([
            'user' => $loggeduser,
            'message' => 'Logged User Data',
            'status' => 'success'
        ], 200);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $loggeduser = auth()->user();
        $loggeduser->password = Hash::make($request->password);
        $loggeduser->save();
        return response([
            'message' => 'Password Changed Successfully',
            'status' => 'success'
        ], 200);
    }
}
