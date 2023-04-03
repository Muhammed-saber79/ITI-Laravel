<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Index Action...
    function index(){
        $data = DB::table('posts')->join('users','users.id','=','posts.user_id')->select('posts.id','posts.title','posts.description','posts.created_at','users.name as post_creator')->orderBy('posts.id')->get(); 
        return view('posts.index' , ['data'=>$data]);
    }

    // Create Action...
    function create(){
        $users = User::all();
        return view('posts.create' , ['users'=>$users]);
    }

    // Store Action...
    function store(Request $request){
        $newPost = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->post_creator,
        ]);
        return redirect()->route('posts.index')->with('status','Post Created Successfully.');
    }

    // Show Action...
    function show($id){
        $postData = DB::table('posts')->join('users','users.id','=','posts.user_id')->select('posts.id','posts.title','posts.description','posts.created_at','users.name as post_creator')->orderBy('posts.id')->where('posts.id','=',$id)->get(); 
        return view('posts.show' , ['post'=>$postData[0]]);
    }

    // Edit Action...
    function edit($id){
        $users = User::all();
        $postData = DB::table('posts')->join('users','users.id','=','posts.user_id')->select('posts.id','posts.title','posts.description','posts.user_id','posts.created_at','users.name as post_creator')->orderBy('posts.id')->where('posts.id','=',$id)->get(); 
        return view('posts.edit' , ['post'=>$postData[0] , 'users'=>$users]);
    }

    // Update Action...
    function update($id , Request $request){
        $postUpdate = Post::findOrFail($id);

        Post::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('posts.index')->with('status','Post Updated Successfully.');
    }

    // Destroy Action...
    function destroy($id){
        $postDelete = Post::destroy($id);
        
        return redirect()->route('posts.index')->with('danger','Post Deleted Successfully.');
    }
}
