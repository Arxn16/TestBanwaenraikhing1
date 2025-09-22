<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout(); // ออกจากระบบ
        $request->session()->invalidate(); // ยกเลิก session
        $request->session()->regenerateToken(); // รีเซ็ต CSRF token
        
        return redirect('/login'); // หรือหน้าที่คุณต้องการให้ผู้ใช้ไป
    }
}
