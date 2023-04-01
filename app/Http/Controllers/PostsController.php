<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    // Posts Array...
    public $postsArr = [
        [
            'id'=>1,
            'title'=>'Post From Ahmed',
            'decsription'=>'this is the first post from ahmed...',
            'posted_by'=>'Ahmed',
            'created_at'=>'2023-04-01 01:01:01'
        ],
        [
            'id'=>2,
            'title'=>'Post From Muhammed',
            'decsription'=>'this is the first post from muhammed...',
            'posted_by'=>'Muhammed',
            'created_at'=>'2023-04-01 02:01:01'
        ],
        [
            'id'=>3,
            'title'=>'Post From Majed',
            'decsription'=>'this is the first post from majed...',
            'posted_by'=>'Majed',
            'created_at'=>'2023-04-01 03:01:01'
        ]
    ];

    // Index Action...
    function index(){
        return view('posts.index' , ['posts'=>$this->postsArr]);
    }

    // Create Action...
    function create(){
        return view('posts.create');
    }

    // Store Action...
    function store(){
        return redirect()->route('posts.index');
    }

    // Show Action...
    function show($id){
        $post=[];
        foreach($this->postsArr as $current_post){
            if($current_post['id'] == $id){
                $post = $current_post;
            }
        }
        return view('posts.show' , ['post'=>$post]);
    }

    // Edit Action...
    function edit($id){
        return view('posts.edit',['post'=>$id]);
    }

    // Update Action...
    function update($id){
        return redirect()->route('posts.index')->with('status','Post Updated Successfully.');
    }

    // Destroy Action...
    function destroy($id){
        return redirect()->route('posts.index')->with('danger','Are You Sure?');
    }
}
