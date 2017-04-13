<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;



class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(){

        

         //$posts=$posts->all();
    	 
         $posts=Post::latest();


         if ($x=request('month')) {
             $posts->whereMonth('created_at',Carbon::parse($x)->month);
         }

         if ($y=request('year')) {
             $posts->whereYear('created_at',$y);
         }

         $posts=$posts->get();

       // $archives=Post::archives();

        //return $archives;

    	return view('posts.index',compact('posts'));
    }

    public function show(Post $post){   //ei function re maddhom e individual post show korbe

    	return view('posts.show',compact('post'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	$post= new Post;
    	$this->validate(request(),[
    			'title'=>'required',
    			'body'=>'required'
    		]);
    	Post::create([
    		'title'=>request('title'),
    		'body'=>request('body'),
            'user_id'=>auth()->id()
    	]);

    	return redirect('/');
    }
}
