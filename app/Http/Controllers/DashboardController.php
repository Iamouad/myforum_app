<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct(){
        //$this->middleware();
    }
    
    
    public function index()
    {
        // switch (true) {
        //     case Auth::user()->isInRole("admin"):
        //         $pendedUsers = User::where('validated_by_admin', 0)->orderBy('created_at', 'ASC')->get();               
        //         return view('admin.pended_users', [
        //             'pendedUsers' => $pendedUsers
        //         ]);
        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }
        if(Auth::user()->accepted()){
            $categories = Categorie::all();
            return view('layouts.dashboard', ['categories' => $categories]);
        }

        return view('layouts.pended');
    }
}
