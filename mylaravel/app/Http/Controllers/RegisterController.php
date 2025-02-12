<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // ใช้ Hashing รหัสผ่าน

class RegisterController extends Controller
{
    function index(){
        return view('registers');
    }

    function create(Request $req){
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',      // ต้องมีตัวพิมพ์เล็ก
                'regex:/[A-Z]/',      // ต้องมีตัวพิมพ์ใหญ่
                'regex:/[0-9]/',      // ต้องมีตัวเลข
            ],
            'checkbox' => 'accepted'
        ], [
            'name.required' => 'กรุณากรอกชื่อของคุณ',
            'email.required' => 'กรุณากรอกอีเมลที่ถูกต้อง',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง (เช่น example@example.com)',
            'email.unique' => 'อีเมลนี้ถูกใช้ไปแล้ว กรุณาใช้อีเมลอื่น',
            'password.required' => 'กรุณากรอกรหัสผ่านของคุณ',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
            'password.regex' => 'รหัสผ่านต้องมีตัวพิมพ์เล็ก, ตัวพิมพ์ใหญ่ และตัวเลข',
            'checkbox.accepted' => 'กรุณายอมรับเงื่อนไขก่อนทำการสมัครสมาชิก',
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('/user')->with('success', 'สมัครสมาชิกสำเร็จ');
    }
}
