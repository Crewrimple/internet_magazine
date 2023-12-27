<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\User\EditUserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Форма авторизации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * Получения данных с формы авторизации через POST запрос
     * @param LoginValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return back()->with(['success' => 'true']);
        }
        return back()->withErrors(['auth' => 'Логин или пароль не верный!']);
    }

    /**
     * Форма регистрации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('users.register');
    }

    /**
     * Получения данных с формы регистрации через POST запрос
     * @param RegisterValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(RegisterValidation $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create([
            'email' => $validatedData['email'],
            'login' => $validatedData['login'], 
            'password' => $validatedData['password'],
            'fullname' => $validatedData['fullname'], 
            'address' => $validatedData['address'], 
            'role' => $validatedData['role'], 
        ]);
    
        return redirect()->route('login')->with(['register' => true]);
    }
    

    public function cabinet()
    {
        return view('users.cabinet');
    }

    public function cabinetEdit()
    {
        return view('users.edit');
    }

    public function cabinetEditPost(EditUserValidation $request)
    {
        $arr = $request->validated();
        if(!$arr['password']) unset($arr['password']);
        else $arr['password'] = Hash::make($arr['password']);
        $user = Auth::user();
        $user->update($arr);
        return back()->with(['success' => true]);
    }

   
     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
