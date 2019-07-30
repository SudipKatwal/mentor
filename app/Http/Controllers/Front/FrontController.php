<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FrontController extends Controller
{
    public function index(){
        return view('front.pages.index.index',
            [
                'colleges'  => User::where('type','!=','admin')->get(),
            ]
        );
    }

    public function profile($slug){
        return view('front.pages.profile.profile',
            [
                'college'  => User::find($slug),
            ]
        );
    }
}
