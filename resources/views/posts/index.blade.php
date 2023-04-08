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
@endif

@if(session('danger'))
    <div class="alert alert-danger confirm alert-dismissible fade show text-center m-auto w-75 mt-5 mb-5 " role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('danger') }}
    </div>
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
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <?php
                        $date = Carbon::parse($post->created_at);

                        echo $date->diffForHumans();
                        ?>
                    </td>
                    <td class="d-flex align-items-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info mx-2">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary mx-2">Edit</a>
                        <button class="btn btn-danger delete" data-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#confirm-delete">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
    </table>
</div>
<div class="d-flex justify-content-center mb-5">
    {{ $data->links("pagination::bootstrap-5") }}
</div>

<!-- Confirm Delete -->
<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        U are about To <span class="fs-5 text-danger">DELETE</span> This Post, Are U Sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/posts/" method="POST" class="mx-2" id="delete-form">   <!-- onsubmit="confirmDelete(event)" -->
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Confirm Delete</button>  <!-- onclick="confirmDelete(event)" -->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Confirm Delete -->

<script>
    $(document).ready(function(){
        $(".delete").on('click',function(){
            var post_id = $(this).data('id');
            $("#delete-form").attr('action','/posts/'+post_id);
            $("#confirm-delete").modal('show');
        })
    })
</script>

@endsection