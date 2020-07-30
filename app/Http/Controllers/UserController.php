<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function redirectProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser();

        Auth::login($authUser);
        return redirect('client');
    }

    private function findOrCreateUser($user)
    {
        $authUser = User::where('social_id',$user->id)->first();

        if($authUser){
            return $authUser;
        }
        else
        {
            return User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'ruler' => 0,
                    'status' => 0,
                    'avatar' => $user->avatar,
                    'password' => '',
                    'social_id' => $user->id
                ]);
        }
        
    }

    public function login(Request $request)
    {
        $data = $request->only('email','password');

        if(Auth::attempt($data,$request->has('remember'))){
            return back()->with('thongbao','Đăng nhập thành công');
        }
        else{
            return back()->with('errors','Đăng nhập thất bại');
        }
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect('/')->with('thongbao','Đã đăng xuất');
        }
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'unique:users,name|required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:18',
            're-password' => 'required|same:password',
        ],
        [
            'email.email' => 'Email của bạn không đúng',
            'email.required' => 'Yêu cầu nhập Email ',
            'name.unique' => 'Tên tài khoản bị trùng',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min' => 'Yêu cầu mật khẩu tối thiểu 6 kí tự',
            'password.max' => 'Yêu cầu mật khẩu tối đa 18 kí tự',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'name.required' => 'Yêu cầu nhập tên tài khoản',
            're-password.same' => 'Mật khẩu không trùng khớp'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return back()->with('thongbao','Đăng ký tài khoản thành công');
    }

    public function adminLogin(Request $request)
    {
        $data = $request->only('email','password');
        if(Auth::attempt($data, $request->has('remember'))){
            if(Auth::user()->role == 1)
                return redirect('admin/')->with('thongbao','Chào Đấng Tối Cao (@.@) ạ!');

            //Thủ Kho chỉ cho xem đơn hàng hoặc sản phẩm
            else if(Auth::user()->role == 2)
                return redirect()->route('product.index')->with('thongbao','Chào Thủ Kho :)');
            
            else if(Auth::user()->role == 3)
                return redirect('admin/order')->with('thongbao','Chào Quản Lý Khách Hàng');
        }
        else{
            return back()->with('errors','Đăng nhập thất bại! Vui lòng kiểm tra lại tài khoản');
        }
    }
}
