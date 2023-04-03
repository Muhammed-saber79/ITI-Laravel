@extends('layouts.app')

@section('title') Create Post @endsection

@section('content')
<h3 class="mt-3 text-center">Here U Can Create New Post...</h3>
<hr class="m-auto w-50">
<form action="{{ route('posts.store') }}" method="POST" class="m-auto w-75 mt-5">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input type="text"
        class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Post Creator</label>
        <select class="form-select form-select-lg" name="post_creator" id="">
            @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Created At</label>
      <input type="datetime-local" class="form-control"  name="created_at" id="">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection