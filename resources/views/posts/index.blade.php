<?php
use Carbon\carbon
?>
@extends('layouts.app')

@section('title') Index @endsection

@section('content')

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show text-center m-auto w-75 mt-5 mb-5 " role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('status') }}
    </div>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
        })
    </script>
@endif

@if(session('danger'))
    <div class="alert alert-danger confirm alert-dismissible fade show text-center m-auto w-75 mt-5 mb-5 " role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('danger') }}
    </div>

    <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
        })
    </script>
@endif

<div class="table-responsive mt-5 text-center">
    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3 mb-3">Create</a>
    <table class="table table-striped
    table-hover	
    table-secondary
    align-middle
    m-auto w-75">
        <thead class="table-light text-center">
            <caption>Table Name</caption>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Posted By</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($data as $post)
                <tr class="table-primary" >
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->post_creator }}</td>
                    <td>
                        <?php
                        $date = Carbon::parse($post->created_at);

                        echo $date->diffForHumans();
                        ?>
                    </td>
                    <td class="d-flex align-items-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info mx-2">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mx-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mx-2 delBtn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
    </table>
</div>

<script>
    let delBtn = document.querySelectorAll(".delBtn");
    for(i in delBtn){
        delBtn[i].addEventListener('submit',function(event){
        if(!window.confirm("Are U Sure U Want To Delete This Record?")){
            event.preventDefault();
        }
    })
    }
</script>
@endsection