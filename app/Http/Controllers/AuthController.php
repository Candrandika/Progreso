<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Validator};
use App\Models\User;
use Illuminate\Auth\Events\Validated;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('login');
    }
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }else{
            return redirect('login')->withInput();
        }        
    }
    public function viewRegister() {
        return view('register');
    }
    public function register(Request $request) {

        $request->validate([
            'email' => 'bail|required|email|min:8|max:255|unique:users',
            'name' => 'bail|required|min:3|max:255',
            'password' => 'bail|required|min:8|max:255',
            'confirm_password' => 'bail|required|same:password'
        ]);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect('/');
    }
    public function logout(){
        Auth::logout();

        return redirect('/');
    }
    public function authCheck() {
        return response()->json([
            'auth' => Auth::check()
        ]);
    }
    public function getProfile() {
        return response()->json([
            'profile' => Auth::user()
        ]);
    }
    public function editProfile(Request $request, $id) {
        if(!$request->file) {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return response()->json('data berhasil diupdate');
        }else {
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $imageLoc = '/assets/media/profile/';
            $imageNames = $imageLoc.$imageName;

            $image->move(public_path($imageLoc), $imageName);

            User::where('id', $id)->update([
                'image' => $imageNames
            ]);

            return response()->json('data berhasil diupdate');
        }
    }
}
