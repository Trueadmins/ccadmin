<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('sadmin');
    }

    public function sadminDashboard(Request $request)
    {
        return response()->json([
            'success' => true,
            'users' => User::all()->count(),
        ]);
    }

    public function allUsers()
    {
        $users = User::get();
        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }
}
