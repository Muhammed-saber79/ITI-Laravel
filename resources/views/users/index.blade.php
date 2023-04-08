@extends('layouts.app')

@section('title') Users Index @endsection

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
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($users as $user)
                <tr class="table-primary" >
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('posts.show', $user->id) }}" class="btn btn-info mx-2">Show</a>
                        <a href="{{ route('posts.edit', $user->id) }}" class="btn btn-primary mx-2">Edit</a>
                        <form action="{{ route('posts.destroy', $user->id) }}" method="POST" class="mx-2 delBtn">
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
<div class="d-flex justify-content-center mb-5">
    {{ $users->links("pagination::bootstrap-5") }}
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