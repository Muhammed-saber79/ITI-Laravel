@extends('layouts.app')

@section('title') Edit Post Data @endsection

@section('content') 

<div class="w-75 m-auto my-5">
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>

<h3 class="mt-3 text-center">Here is a Form To Edit Post Data...</h3>
<hr class="m-auto w-50">

<hr class="m-auto w-50">
<form action="{{ route('posts.update', $post->id) }}" method="POST" class="m-auto w-75 mt-5">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input type="text"
        class="form-control" name="title" id="" aria-describedby="helpId" value="{{ $post->title }}" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Description</label>
      <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Post Creator</label>
        <select class="form-select form-select-lg" name="post_creator" id="">
            @foreach($users as $user)
              <option value="{{ $post->user_id  }}" <?php if($user->id == $post->user_id ) echo 'selected'; ?> > {{ $user->name }} </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Created At</label>
      <input type="datetime-local" class="form-control"  name="created_at" value="{{ $post->created_at }}" id="">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection