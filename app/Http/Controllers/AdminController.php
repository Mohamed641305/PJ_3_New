<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // إجمالي المستخدمين
        $usercount = User::count();

        // المستخدمون النشطون
        $activeUsers = User::where('status', '0')->count();

        // المستخدمون المحظورون
        $blockedUsers = User::where('status', '1')->count();

        // عدد الأدمن
        $adminsCount = User::where('role', 'admin')->count();

        return view('dashboard', compact(
            'usercount',
            'activeUsers',
            'blockedUsers',
            'adminsCount'
        ));
    }
}