<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use App\Models\VisitDetail;


class LoginController extends Controller
{
    //
    public function login()
    {
        return view('frontend.login');
    }

    public function log_in(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // dd($user);

        if ($user && Hash::check($request->password, $user->password)) {
            // dd($user);
            $vcount = Visitor::count();
            // dd($vcount);
            $qualityCount = VisitDetail::where('department_id',3)->count();
            $designCount = VisitDetail::where('department_id',1)->count();
            $newCount = Visitor::where('status', 0)->count();
            return view('frontdesk.dashboard',compact('vcount','newCount','qualityCount','designCount'));
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/')->withHeaders(['Cache-Control' => 'no-cache, no-store, must-revalidate', 'Pragma' => 'no-cache', 'Expires' => '0']);
}
    
}
