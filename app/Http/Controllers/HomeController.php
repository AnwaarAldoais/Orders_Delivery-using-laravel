<?php

namespace App\Http\Controllers;
use App\User;
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
        $id=auth()->id();
        $user=User::find($id);
        return view('ControlPanel.controlPanel',compact('user'));
    }

    public function guest()
    {
        return redirect()->route('product.index')->with('success','successfully registered ,waiting for approve');
    }
}
