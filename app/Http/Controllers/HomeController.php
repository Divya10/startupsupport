<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $category = $user->category;
        $status = $user->status;
        $categories=DB::table('res_category')->get();
        return view('home',compact('category','status','categories'));
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        if($user->category=="org") {
            $contact = $request->contact;
            $desc = $request->description;
            $year = $request->year;
            DB::table('org_profile')->insert(['user_id'=>$user->id,'year_estb'=>$year,'description'=>$desc]);
        }   
        else {
            $contact = $request->contact;
            $category = $request->category;
            $res_category = $request->resource_category;
            $qty = $request->quantity;
            $cost = $request->cost;
            $desc = $request->desc;
            $term = $request->term;
            DB::table('usr_profile')->insert(['user_id'=>$user->id,'category'=>$category,'contact'=>$contact]);
            DB::table('usr_resource')->insert(['user_id'=>$user->id,'category'=>$res_category,'quantity'=>$qty,'cost'=>$cost,'desc'=>$desc,'term'=>$term]);
        }     
        return;
    }
}
