<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password']=Hash::make($request->password);
        User::create($data);
        return redirect()->route('login');
        // return redirect()->route('admin.products.list');
    }
}
