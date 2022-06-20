<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function restaurantStatus()
    {
        $users=User::where('type','=','Restaurant')
            ->where('status','=',0)
            ->get();
        return view('ControlPanel/admin.restaurantStatus',compact('users'));
    }
    public function approveRestaurant($id)
    {
        $user=User::findorfail($id);
        $user->status=true;
        $user->save();
        return redirect('/restaurantStatus');
    }

    public function rejectRestaurant($id)
    {
        User::findorfail($id)->delete();
        return redirect('/restaurantStatus');
    }

    public function manageDelivers()
    {
        $users=User::where('type','=','Deliver')
            ->where('status','=',1)
            ->get();
        return view('ControlPanel/admin.manageDeliver',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDeliver()
    {
        return view('ControlPanel/admin.addDeliver');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDeliver(Request $request)
    {
        $hashed=Hash::make('$request->password');

            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => $hashed,
                'address'=>null,
                'type' => 'Deliver',
                'status' => true,
                'img' => null,
            ]);

        return redirect('/manageDelivers');
    }

    public function editDeliver($id)
    {
         $deliver=User::findorfail($id);
         return view('ControlPanel/admin.editDeliver',compact('deliver'));
    }
    public function updateDeliver(Request $request,$id)
    {
        $user=User::findorfail($id);
        $user->name=$request->name;
        $user->password=$user->password;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        return redirect('/manageDelivers');
    }

    public function deleteDeliver($id)
    {
        User::findorfail($id)->delete();
        return redirect('/manageDelivers');
    }

    public function getDeliverPassword($id)
    {
        $user=User::findorfail($id);
        return view('ControlPanel/admin.deliverPassword',compact('user'));

    }
    public function postDeliverPassword(Request $request,$id)
    {
        $hashed= Hash::make('$request->password');
        $user=User::findorfail($id);
        $user->password=$hashed;
        $user->save();
        return redirect('/manageDelivers');

    }
}
