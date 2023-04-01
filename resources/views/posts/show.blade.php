@extends('layouts.app')

@section('title') Show Post Details @endsection

@section('content')
<div class="card w-75 m-auto mt-5">
    <div class="card-header">
        Post Details
    </div>
    <div class="card-content">
        <ul>
            @foreach ($post as $key=>$value)
                <li>{{ $key }} : {{ $value }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection