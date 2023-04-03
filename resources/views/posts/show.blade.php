<?php
use Carbon\carbon
?>
@extends('layouts.app')

@section('title') Show Post Details @endsection

@section('content')
<div class="card w-75 m-auto mt-5">
    <div class="card-header">
        Post Details
    </div>
    <div class="card-content">
        <ul>
            <li>ID: {{ $post->id }}</li>
            <li>Title: {{ $post->title }}</li>
            <li>Description: {{ $post->description }}</li>
            <li>Posted By: {{ $post->post_creator }}</li>
            <li>Created At: 
                <?php
                $date = Carbon::parse($post->created_at);
                echo $date->diffForHumans();
                ?>
            </li>
        </ul>
    </div>
</div>
@endsection