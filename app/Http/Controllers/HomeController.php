<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){
        $branches=Branch::all();
        return view('home',compact('branches'));
    }
    public function show($id){
       // return $id;

        $branches=Branch::find($id);

        //dd($branches);
        return view('customercare.branch',compact('branches'));
    }
}
