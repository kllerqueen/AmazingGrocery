<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;

class AccountController extends Controller
{
     public function registerAccount(Request $request){
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => 'required|email|unique:accounts,email',
            'role' => 'required|in:User,Admin',
            'gender' => 'required',
            'display_picture' => 'required',
            'password' => 'required|alpha_num|min:8',
            'confirm_pass' => 'required_with:password|alpha_num|min:8|same:password'
        ]);

        // $imagePath = $request->file('display_picture')->getClientOriginalName();

        // echo($request->input('first_name'));
        // echo($request->input('last_name'));
        // echo($request->input('email'));
        // echo($request->input('role'));
        // echo($request->input('gender'));
        // echo($imagePath);
        // echo($request->input('password'));
        // echo($request->input('confirm_pass'));

        $account = new User();

        $account->first_name = $request->input('first_name');
        $account->last_name = $request->input('last_name');
        $account->email = $request->input('email');
        $imagePath = $request->file('display_picture')->store('user', 'public');
        $account->display_picture_link =  $imagePath;
        $account->password = Hash::make($request->input('password'));

        if(strcmp($request->input('gender'), 'Male')){
            $account->gender_id = 2;
        } else $account->gender_id = 1;

        if(strcmp($request->input('role'), 'User')){
            $account->role_id = 2;
        } else $account->role_id = 1;

        $account->save();

        return redirect('login');
    }

    public function loginAccount(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('homePage');
        }

        return redirect()->back()->with('error', 'account not found');
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }

    public function getProfileData(){
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    public function manageAccounts(){
        $users = User::all();

        return view('admin.maintain', compact('users'));
    }

    public function updateProfile(Request $request, User $user){
        $request->validate([
            'first_name' => 'required|alpha|max:25',
            'last_name' => 'required|alpha|max:25',
            'email' => ['required', 'email', ValidationRule::unique('users', 'email')->ignore(auth()->id())],
            'gender' => 'required',
            'display_picture' => 'required',
            'password' => 'required|alpha_num|min:8',
            'confirm_pass' => 'required_with:password|alpha_num|min:8|same:password'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $imagePath = $request->file('display_picture')->store('user', 'public');
        $user->display_picture_link =  $imagePath;
        $user->password = Hash::make($request->input('password'));

        if(strcmp($request->input('gender'), 'Male')){
            $user->gender_id = 2;
        } else $user->gender_id = 1;

        $user->save();
        return redirect()->route('homePage');

    }

    public function changeRolePage($id){
        $user = User::where('id', $id)->first();

        return view('admin.update', compact('user'));
    }

    public function updateRole(Request $request, $id){
        $user = User::where('id', $id)->first();

        if($request->input('role') == 'User'){
            $user->role_id = 1;
        } else{
            $user->role_id = 2;
        }
    
        $user->save();

        return redirect()->route('updateProfile');
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();

        Storage::disk('public')->delete($user->display_picture_link);

        $user->delete();

        return redirect()->route('updateProfile');
    }
}
