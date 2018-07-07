@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($threads as $thread)
            <div class="card">
                <div class="card-header">
                    <h4><a href="{{$thread->path()}}">{{$thread->title}} | {{$thread->creator->name}}</a></h4>
                </div>
                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection