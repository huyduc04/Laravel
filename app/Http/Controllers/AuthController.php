<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Session;
//use App\Http\Requests\UserLoginRequest;

use App\Events\UserRegistered;

class AuthController extends Controller
{
    public function login (){
        return view('login');
    }
    public function postLogin (Request $req){
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|'
        ]);
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        $renember = $req->has('renember');

        if(Auth::attempt($dataUserLogin,$renember)){
            //logout hết các tài khoản
            Session::where('user_id', Auth::id())->delete();
            // Tạo phiên đăng nhập mới
            if(Auth::user()->role == '1'){
                return redirect()->route('admin.products.listProduct')->with([
                    'error' => 'Đăng nhập thành công'
                ]);
            }else{
                return redirect()->route('users.home')->with('success', 'Đăng nhập thành công');
            }
        }else{
            return redirect()->route('login')->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'error' => 'Đăng xuất thành công'
        ]);
    }

    public function register(){
        return view('register');
    }

    public function postRegister(Request $req)
    {

        $check = User::where('email', $req->email)->exists();

        if ($check) {
            return redirect()->back()->with('error', 'Email đã tồn tại');
        } else {
            if ($req->password !== $req->password_confirmation) {
                return redirect()->back()->with('error', 'Mật khẩu và xác nhận mật khẩu không khớp');
            }

            // Tạo đối tượng User
            $newUser = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);

            // Phát sự kiện với đối tượng User
            event(new UserRegistered($newUser));

            return redirect()->route('login')->with('success', 'Đăng ký thành công. Mời bạn đăng nhập');
        }
    }

}
