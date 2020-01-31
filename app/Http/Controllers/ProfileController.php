<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use DB;

class ProfileController extends Controller
{
    function show() {
        $result = \App\Tweet::all();
        if(Auth::check()) {
        return view('profile', ['tweets'=>$result]);
        } else {
            return view('posts',['tweets'=>$result]);
        }
    }

    function showForm(Request $request) {
        $tweet = \App\Tweet::find($request->id);
        return view('editFormPost', ['tweet'=>$tweet]);
    }
    function editTweet(Request $request) {
        //$validatedData=$request->validate([
        //'content'=>'required|min:2|max:100',
        //'author'=>'required|min:5||max:20']);
        //if($request->has('content') && $request->has('author')) {
            if(Auth::check()) {
            \App\Tweet::where('id', $request->id)->update(['author' => $request->author, 'content' => $request->content]);
            $result = \App\Tweet::all();
            }
            return redirect('profile');
    }
    function deleteTweet(Request $request) {
        \App\Tweet::destroy($request->id);
        $result = \App\Tweet::all();
        return redirect ('profile');
    }

    function createTweet(Request $request) {
        $validatedData=$request->validate([
        'content'=>'required|min:2|max:100',
        'author'=>'required|min:5||max:20']);

        if(Auth::check()) {
            $tweet=new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content =$request->content;
            $tweet->save();
        }
        return redirect('profile');

        //DB::insert("INSERT INTO tweets (author,content) VALUES ('$request->author','$request->content');");
        //$tweets = DB::table('tweets')->get();
        //return view("profile", [ "tweets" => $tweets]);
    }
}
