<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {public function showLogin(){return view('admin.auth.login');}public function login(Request $r){$d=$r->validate(['email'=>'required|email','password'=>'required']);if(Auth::attempt($d)){$r->session()->regenerate();return redirect('/admin');}return back()->withErrors(['email'=>'Invalid credentials.']);}public function logout(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect('/admin/login');}}
