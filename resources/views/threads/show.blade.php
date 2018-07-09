@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>{{$thread->title}}</h4>
            </div>
            <div class="card-body">
                {{$thread->body}}
            </div>
        </div>
        <form class="mb-4 mt-4" action="/reply/{{$thread->id}}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control w-100" name="body" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary">Reply</button>
            </div>
        </form>
        @foreach($thread->replies as $reply)
            @include('threads.replies')
        @endforeach
    </div>
@endsection