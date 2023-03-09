<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    function index()
    {
        return view('auth.index');
    }
    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    function callback()
    {
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar;

         $cek = User::where('email', $email)->count();
        if ($cek > 0) {
            $avatar_file = $id . ".jpg";
            $fileConten = file_get_contents($avatar);
            File::put(public_path("admin/img/avatar/$avatar_file"), $fileConten);
            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'avatar' => $avatar_file
                ]
            );
            Auth::login($user);
            return Redirect()->to('dashboard');
             } else {
            return Redirect()->to('auth')->with('Error', 'Akun Yang anda masukkan tidak di izinkan');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
