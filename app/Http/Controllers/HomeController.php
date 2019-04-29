<?php

namespace App\Http\Controllers;
use App\Eloquents\Users\User;
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
    $user = User::where('role_id',4)->get();
    foreach( $user as $use ){
       echo $use->roles;
    }



//       return view('home');
    }
}
