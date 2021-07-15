<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index() {
        $title = 'Dashboard | Scout Beyond';
        $activeMenu = 'Dashboard';

        return view('Admin.dashboard', compact('title', 'activeMenu'));
    }

    public function logout() {
        Session::forget(['admin_login_status', 'admin_user_id']);
        return redirect('/');
    }
}
