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
    </div>
@endsection