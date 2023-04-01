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
        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Description</label>
      <textarea class="form-control" name="" id="" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Post Creator</label>
        <select class="form-select form-select-lg" name="" id="">
            <option selected>Ahmed</option>
            <option value="">Muhammed</option>
            <option value="">Majed</option>
            <option value="">Basem</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection