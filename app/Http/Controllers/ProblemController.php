<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function show($id){
        $beanches=Branch::find($id);
        if($beanches){
            return view('customercare.problem',compact('beanches'));
        }
        else{
            return redirect()->back();
        }
    }

    public function create(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'date'=>'required',
            'devicename'=>'required',
            'modelnumber'=>'required',
            'problem' => 'required|min:5',
            'description' => 'required|min:5',
        ]);

        $token = rand(1,100000).Auth::user()->id;
        $auth = Auth::user();
        $email= Mail::send('auth.emails.token',['token'=>$token],function($message)use($auth){

            $message->to($auth->email,$auth->fname)->subject("Your Token Number");

        });

        if($email) {
            $problem = new Problem();
            $problem->user_id = Auth::user()->id;
            $problem->branch_id = $request->get('id');
            $problem->date = date('Y-m-d', strtotime($request->get('date')));
            $problem->devicename = $request->get('devicename');
            $problem->modelname = $request->get('modelnumber');
            $problem->problem = $request->get('problem');
            $problem->description = $request->get('description');
            $problem->token = $token;
            $problem->save();

        }

        return redirect('/');
    }

    public function search(){
        return view('customercare.search',compact('problems'));
    }

    public function tokenSearch(Request $request){
        $token=$request->get('token');

        $problems =Problem::where('token',$token)->get();

        //dd($problems);
        return view('customercare.result',compact('problems'));

    }
}
