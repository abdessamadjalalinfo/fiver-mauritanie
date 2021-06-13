<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $agents=User::all()->where('type','agent');
        return view('agents',['agents'=>$agents]);
    }
    public function creer_agent(Request $request)
    {
        $agent=new User();
        $agent->email=$request->email;
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->type='agent';
        $agent->password=Hash::make($request->password);
        $agent->name=$request->nom.$request->prenom;
        $agent->save();
       // return redirect('agents');

    }
}
